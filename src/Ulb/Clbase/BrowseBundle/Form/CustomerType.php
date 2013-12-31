<?php

namespace Ulb\Clbase\BrowseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName','text', array('label' => 'Имя', 'required' => true,))
            ->add('lastName','text', array('label' => 'Фамилия', 'required' => true,))
            ->add('email','text', array('label' => 'Электронная почта', 'required' => true,))
            ->add('tel','text', array('label' => 'Телефон', 'required' => true,))
            ->add('mainCity','text', array('label' => 'Регион', 'required' => true,))
            ->add('town','text', array('label' => 'город', 'required' => false,))
            ->add('street','text', array('label' => 'Улица', 'required' => true,))
            ->add('houseNum','text', array('label' => 'Дом', 'required' => false,))
            ->add('blockNum','text', array('label' => 'Корпус', 'required' => false,))
            ->add('buildNum','text', array('label' => 'Строение', 'required' => false,))
            ->add('porch','text', array('label' => 'Подъезд', 'required' => false,))
            ->add('floor','text', array('label' => 'Этаж', 'required' => false,))
            ->add('flat','text', array('label' => 'Квартира', 'required' => false,))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ulb\Clbase\BrowseBundle\Entity\Customer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ulb_clbase_browsebundle_customer';
    }
}
