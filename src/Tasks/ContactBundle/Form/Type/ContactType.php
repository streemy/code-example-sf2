<?php
namespace Tasks\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'attr' => array(
                    'placeholder' => 'Enter your Name',
                )))
            ->add('email', 'email', array(
                'attr' => array(
                    'placeholder' => 'Enter your Email',
                )))
            ->add('subject', 'text', array(
                'attr' => array(
                    'placeholder' => 'Enter Subject',
                )))
            ->add('message', 'textarea', array(
                'attr' => array(
                    'cols' => 20,
                    'rows' => 5,
                    'placeholder' => 'Enter message ...'
                )))
            ->add('send', 'submit', array('label' => 'Send'))
            ->getForm();
    }

    public function getName()
    {
        return 'contact';
    }
}