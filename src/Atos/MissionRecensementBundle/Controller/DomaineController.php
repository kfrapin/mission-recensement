<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atos\MissionRecensementBundle\Entity\Domaine;
use Atos\MissionRecensementBundle\Form\DomaineType;

/**
 * Domaine controller.
 *
 */
class DomaineController extends Controller
{

    /**
     * Lists all Domaine entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtosMissionRecensementBundle:Domaine')->findAll();

        return $this->render('AtosMissionRecensementBundle:Domaine:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Domaine entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Domaine();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domaine_show', array('id' => $entity->getId())));
        }

        return $this->render('AtosMissionRecensementBundle:Domaine:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Domaine entity.
    *
    * @param Domaine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Domaine $entity)
    {
        $form = $this->createForm(new DomaineType(), $entity, array(
            'action' => $this->generateUrl('domaine_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Domaine entity.
     *
     */
    public function newAction()
    {
        $entity = new Domaine();
        $form   = $this->createCreateForm($entity);

        return $this->render('AtosMissionRecensementBundle:Domaine:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Domaine entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Domaine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaine entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Domaine:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Domaine entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Domaine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaine entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Domaine:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Domaine entity.
    *
    * @param Domaine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Domaine $entity)
    {
        $form = $this->createForm(new DomaineType(), $entity, array(
            'action' => $this->generateUrl('domaine_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Domaine entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Domaine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaine entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('domaine_edit', array('id' => $id)));
        }

        return $this->render('AtosMissionRecensementBundle:Domaine:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Domaine entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtosMissionRecensementBundle:Domaine')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Domaine entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('domaine'));
    }

    /**
     * Creates a form to delete a Domaine entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('domaine_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
