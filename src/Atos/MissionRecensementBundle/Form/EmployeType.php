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
            ->add('prenom')
            ->add('matricule')
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('plainPassword')
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
