<?php

namespace Atos\MissionRecensementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MissionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('descriptionProcessus')
            ->add('descriptionTechnique')
            ->add('descriptionFonction')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('employe')
            ->add('client')
            ->add('metier')
            ->add('typePrestation')
            ->add('niveau')
            ->add('type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Atos\MissionRecensementBundle\Entity\Mission'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'atos_missionrecensementbundle_mission';
    }
}
