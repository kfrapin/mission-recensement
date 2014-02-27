<?php

namespace Atos\MissionRecensementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

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
            ->add('client')
            ->add('domaine', 'entity', array(
                'class' => 'Atos\MissionRecensementBundle\Entity\Domaine',
                'query_builder' =>  function(EntityRepository $er) {
                                        return $er->getRoots();
                                    }
            ))
            ->add('sousDomaine', 'entity', array(
                'class' => 'Atos\MissionRecensementBundle\Entity\Domaine',
                'query_builder' =>  function(EntityRepository $er) {
                                        return $er->getNonRoots();
                                    }
            ))
            ->add('metier')
            ->add('typePrestation')
            ->add('niveau')
            ->add('type')
            ->add('descriptionProcessus', 'textarea')
            ->add('descriptionTechnique', 'textarea')
            ->add('descriptionFonction', 'textarea')
            ->add('dateDebut')
            ->add('dateFin')
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
