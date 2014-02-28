<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atos\MissionRecensementBundle\Entity\Employe;
use Atos\MissionRecensementBundle\Form\EmployeType;

/**
 * Employe controller.
 *
 */
class EmployeController extends Controller
{

    /**
     * Lists all Employe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtosMissionRecensementBundle:Employe')->findAll();

        return $this->render('AtosMissionRecensementBundle:Employe:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Employe entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Employe();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('employe_show', array('id' => $entity->getId())));
        }

        return $this->render('AtosMissionRecensementBundle:Employe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Employe entity.
    *
    * @param Employe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Employe $entity)
    {
        $form = $this->createForm(new EmployeType(), $entity, array(
            'action' => $this->generateUrl('employe_create'),
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
     * Displays a form to create a new Employe entity.
     *
     */
    public function newAction()
    {
        $entity = new Employe();
        $form   = $this->createCreateForm($entity);

        return $this->render('AtosMissionRecensementBundle:Employe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Employe entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Employe:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Employe entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Employe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Employe entity.
    *
    * @param Employe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Employe $entity)
    {
        $form = $this->createForm(new EmployeType(), $entity, array(
            'action' => $this->generateUrl('employe_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->get('roles')->setData($entity->getRoles()[0]);
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
     * Edits an existing Employe entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setRoles(array( $editForm->get('roles')->getData() ));
            $em->flush();

            return $this->redirect($this->generateUrl('employe_edit', array('id' => $id)));
        }

        return $this->render('AtosMissionRecensementBundle:Employe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Employe entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtosMissionRecensementBundle:Employe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Employe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('employe'));
    }

    /**
     * Creates a form to delete a Employe entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employe_delete', array('id' => $id)))
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
