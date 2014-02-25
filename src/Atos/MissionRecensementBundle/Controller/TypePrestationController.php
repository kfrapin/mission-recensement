<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atos\MissionRecensementBundle\Entity\TypePrestation;
use Atos\MissionRecensementBundle\Form\TypePrestationType;

/**
 * TypePrestation controller.
 *
 */
class TypePrestationController extends Controller
{

    /**
     * Lists all TypePrestation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtosMissionRecensementBundle:TypePrestation')->findAll();

        return $this->render('AtosMissionRecensementBundle:TypePrestation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TypePrestation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TypePrestation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeprestation_show', array('id' => $entity->getId())));
        }

        return $this->render('AtosMissionRecensementBundle:TypePrestation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TypePrestation entity.
    *
    * @param TypePrestation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TypePrestation $entity)
    {
        $form = $this->createForm(new TypePrestationType(), $entity, array(
            'action' => $this->generateUrl('typeprestation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypePrestation entity.
     *
     */
    public function newAction()
    {
        $entity = new TypePrestation();
        $form   = $this->createCreateForm($entity);

        return $this->render('AtosMissionRecensementBundle:TypePrestation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypePrestation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:TypePrestation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePrestation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:TypePrestation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TypePrestation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:TypePrestation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePrestation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:TypePrestation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TypePrestation entity.
    *
    * @param TypePrestation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypePrestation $entity)
    {
        $form = $this->createForm(new TypePrestationType(), $entity, array(
            'action' => $this->generateUrl('typeprestation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypePrestation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:TypePrestation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePrestation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeprestation_edit', array('id' => $id)));
        }

        return $this->render('AtosMissionRecensementBundle:TypePrestation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TypePrestation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtosMissionRecensementBundle:TypePrestation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypePrestation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typeprestation'));
    }

    /**
     * Creates a form to delete a TypePrestation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeprestation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
