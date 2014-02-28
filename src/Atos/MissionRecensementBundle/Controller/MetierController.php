<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atos\MissionRecensementBundle\Entity\Metier;
use Atos\MissionRecensementBundle\Form\MetierType;

/**
 * Metier controller.
 *
 */
class MetierController extends Controller
{

    /**
     * Lists all Metier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtosMissionRecensementBundle:Metier')->findAll();

        return $this->render('AtosMissionRecensementBundle:Metier:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Metier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Metier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metier_show', array('id' => $entity->getId())));
        }

        return $this->render('AtosMissionRecensementBundle:Metier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Metier entity.
    *
    * @param Metier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Metier $entity)
    {
        $form = $this->createForm(new MetierType(), $entity, array(
            'action' => $this->generateUrl('metier_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Metier entity.
     *
     */
    public function newAction()
    {
        $entity = new Metier();
        $form   = $this->createCreateForm($entity);

        return $this->render('AtosMissionRecensementBundle:Metier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Metier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Metier:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Metier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Metier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Metier entity.
    *
    * @param Metier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Metier $entity)
    {
        $form = $this->createForm(new MetierType(), $entity, array(
            'action' => $this->generateUrl('metier_update', array('id' => $entity->getId())),
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
     * Edits an existing Metier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('metier_edit', array('id' => $id)));
        }

        return $this->render('AtosMissionRecensementBundle:Metier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Metier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtosMissionRecensementBundle:Metier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Metier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('metier'));
    }

    /**
     * Creates a form to delete a Metier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('metier_delete', array('id' => $id)))
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
