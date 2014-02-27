<?php

namespace Atos\MissionRecensementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom', 'text', array(
                'label' => 'Prénom',
            ))
            ->add('matricule')
            ->add('email')
            ->add('specialitesMetier', 'entity', array(
                 'class' => 'Atos\MissionRecensementBundle\Entity\SpecialiteMetier',
                 'expanded' => true,
                 'multiple' => true
            ))
            ->add('username', 'text', array(
                'label' => 'Identifiant',
            ))
            ->add('roles', 'choice', array(
                'mapped' => false,
                'label' => 'Rôle',
                'choices' => array (
                    'ROLE_ADMIN' => 'Administrateur',
                    'ROLE_USER' => 'Utilisateur'
                )
            ))
            ->add('enabled', 'checkbox', array(
                'label' => 'Actif ?',
                'required' => false,
            ))
            ->add('plainPassword', 'repeated', array( 
                'type' => 'password',
                'required' => false,
                'invalid_message' => 'Les mots de passe doivent correspondre',
                'first_options' => array( 'label' => 'Mot de passe'),
                'second_options' => array( 'label' => 'Mot de passe (confirmation)'),
           ))
           ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Atos\MissionRecensementBundle\Entity\Employe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'atos_missionrecensementbundle_employe';
    }
}
