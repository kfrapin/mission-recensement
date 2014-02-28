<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atos\MissionRecensementBundle\Entity\SpecialiteMetier;
use Atos\MissionRecensementBundle\Form\SpecialiteMetierType;

/**
 * SpecialiteMetier controller.
 *
 */
class SpecialiteMetierController extends Controller
{

    /**
     * Lists all SpecialiteMetier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtosMissionRecensementBundle:SpecialiteMetier')->findAll();

        return $this->render('AtosMissionRecensementBundle:SpecialiteMetier:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SpecialiteMetier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SpecialiteMetier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('specialitemetier_show', array('id' => $entity->getId())));
        }

        return $this->render('AtosMissionRecensementBundle:SpecialiteMetier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SpecialiteMetier entity.
    *
    * @param SpecialiteMetier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SpecialiteMetier $entity)
    {
        $form = $this->createForm(new SpecialiteMetierType(), $entity, array(
            'action' => $this->generateUrl('specialitemetier_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array(
                    'label' => 'Créer',
                    'attr' => array(
                        'class' => 'btn btn-success',
                        'icon' => 'ok',
                    )
                ));

        return $form;
    }

    /**
     * Displays a form to create a new SpecialiteMetier entity.
     *
     */
    public function newAction()
    {
        $entity = new SpecialiteMetier();
        $form   = $this->createCreateForm($entity);

        return $this->render('AtosMissionRecensementBundle:SpecialiteMetier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SpecialiteMetier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:SpecialiteMetier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SpecialiteMetier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:SpecialiteMetier:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SpecialiteMetier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:SpecialiteMetier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SpecialiteMetier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:SpecialiteMetier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SpecialiteMetier entity.
    *
    * @param SpecialiteMetier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SpecialiteMetier $entity)
    {
        $form = $this->createForm(new SpecialiteMetierType(), $entity, array(
            'action' => $this->generateUrl('specialitemetier_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Mettre à jour',
                'attr' => array( 
                    'class' => 'btn btn-success',
                    'icon' => 'ok',
                )
        ));

        return $form;
    }
    /**
     * Edits an existing SpecialiteMetier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:SpecialiteMetier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SpecialiteMetier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('specialitemetier_edit', array('id' => $id)));
        }

        return $this->render('AtosMissionRecensementBundle:SpecialiteMetier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SpecialiteMetier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtosMissionRecensementBundle:SpecialiteMetier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SpecialiteMetier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('specialitemetier'));
    }

    /**
     * Creates a form to delete a SpecialiteMetier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('specialitemetier_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'Supprimer',
                'attr' => array( 
                    'class' => 'btn btn-danger',
                    'icon' => 'remove',
                )
))
            ->getForm()
        ;
    }
}
