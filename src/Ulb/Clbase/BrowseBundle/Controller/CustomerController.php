<?php

namespace Ulb\Clbase\BrowseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ulb\Clbase\BrowseBundle\Entity\Customer;
use Ulb\Clbase\BrowseBundle\Form\CustomerType;

/**
 * Customer controller.
 *
 * @Route("/customer")
 */
class CustomerController extends Controller
{

    /**
     * Lists all Customer entities.
     *
     * @Route("/", name="customer")
     * @Route("/page/{page}", name="customers_page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page=1)
    {
        if (!is_numeric($page) OR $page<1) {
            $page=1;
        }
        else {
            $page=floor($page);
        }

        $countPerPage=2;

        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('UlbClbaseBrowseBundle:Customer');

/*        $countQuery=$repository->createQueryBuilder('c')
                                ->select(count('c.id'))
                                ->getQuery();  
                                */
        $countQuery=$em->createQueryBuilder()
                        ->select('Count(c)')
                        ->from('UlbClbaseBrowseBundle:Customer','c')
                        ->getQuery();
        $totalCount=$countQuery->getSingleScalarResult();
        $totalPages=floor(1+($totalCount-1)/$countPerPage);
        if ($totalPages<=1) {
            $totalPages=1;
            $countPerPage=$totalCount;
        }
        if ($page>$totalPages) {
            $currentPage=$totalPages;
        }
        else $currentPage=$page;
        //
        $customerOffset=$countPerPage*($currentPage-1);
        $customerQuery=$em->createQueryBuilder()
                            ->select('c')
                            ->from('UlbClbaseBrowseBundle:Customer','c')
                            ->setFirstResult($customerOffset)
                            ->setMaxResults($countPerPage)
                            ->getQuery();

    // ->orderBy('id','ASC')
        $entities = $customerQuery->getArrayResult();
        
        return array(
            'entities' => $entities,
            'customerOffset' =>$customerOffset,
            'countPerPage'=>$countPerPage,
            'totalCount'=>$totalCount,
            'totalPages'=>$totalPages,
            'currentPage'=>$currentPage,
            
            // 'rightPage'=>$rightPage,
            // 'leftPage'=>$leftPage,
        );
    }
    /**
     * Creates a new Customer entity.
     *
     * @Route("/", name="customer_create")
     * @Method("POST")
     * @Template("UlbClbaseBrowseBundle:Customer:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Customer();
        /* set default non-required values */
        //$entity->setCity("none");
        $entity->setTown("none");
        $entity->setHouseNum("none");
        $entity->setBlockNum("none");
        $entity->setBuildNum("none");
        $entity->setPorch("none");
        $entity->setFloor("none");
        $entity->setFlat("none");



        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('customer_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Customer entity.
    *
    * @param Customer $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Customer $entity)
    {
        $form = $this->createForm(new CustomerType(), $entity, array(
            'action' => $this->generateUrl('customer_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Создать'));

        return $form;
    }

    /**
     * Displays a form to create a new Customer entity.
     *
     * @Route("/new", name="customer_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Customer();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Customer entity.
     *
     * @Route("/{id}", name="customer_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlbClbaseBrowseBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Нет записи о Клиенте.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Customer entity.
     *
     * @Route("/{id}/edit", name="customer_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlbClbaseBrowseBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Нет записи о Клиенте.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Customer entity.
    *
    * @param Customer $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Customer $entity)
    {
        $form = $this->createForm(new CustomerType(), $entity, array(
            'action' => $this->generateUrl('customer_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing Customer entity.
     *
     * @Route("/{id}", name="customer_update")
     * @Method("PUT")
     * @Template("UlbClbaseBrowseBundle:Customer:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlbClbaseBrowseBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Нет записи о Клиенте.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('customer_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Customer entity.
     *
     * @Route("/{id}", name="customer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UlbClbaseBrowseBundle:Customer')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Нет записи о Клиенте.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('customer'));
    }

    /**
     * Creates a form to delete a Customer entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customer_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
