<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Atos\MissionRecensementBundle\Entity\Mission;
use Atos\MissionRecensementBundle\Form\MissionType;

/**
 * Mission controller.
 *
 */
class MissionController extends Controller
{

    /**
     * Lists all Mission entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        // ROLE_ADMIN : Can list all the missions
        if (true === $this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            // List all missions
            $entities = $em->getRepository('AtosMissionRecensementBundle:Mission')->findAll();
        }
        // Not ROLE_ADMIN : User can list its own missions
        else
        {
            // List the missions of the current user
            $id = $this->getUser()->getId();
            $entities = $em->getRepository('AtosMissionRecensementBundle:Mission')->findByEmploye($id);
        }

        return $this->render('AtosMissionRecensementBundle:Mission:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Creates a new Mission entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Mission();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setEmploye($this->get('security.context')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mission_show', array('id' => $entity->getId())));
        }

        return $this->render('AtosMissionRecensementBundle:Mission:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Mission entity.
    *
    * @param Mission $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Mission $entity)
    {
        $form = $this->createForm(new MissionType(), $entity, array(
            'action' => $this->generateUrl('mission_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Mission entity.
     *
     */
    public function newAction()
    {
        $entity = new Mission();
        $form   = $this->createCreateForm($entity);

        return $this->render('AtosMissionRecensementBundle:Mission:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Mission entity.
     *
     */
    public function showAction($id)
    {
        // If the user is not allowed to view the mission
        if($this->isAllowedOnMission($id) === false)
        {
            throw new AccessDeniedException();
        }

        // If the user is allowed to view the mission
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Mission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        // Referer : Previous page
        $previous_page = $this->get('request')->server->get('HTTP_REFERER');
        return $this->render('AtosMissionRecensementBundle:Mission:show.html.twig', array(
            'entity'        => $entity,
            'previous_page' => $previous_page,
            'delete_form'   => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Mission entity.
     *
     */
    public function editAction($id)
    {
        // If the user is not allowed to view the mission
        if(!$this->isAllowedOnMission($id))
        {
            throw new AccessDeniedException();
        }

        // If the user is allowed to view the mission
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Mission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mission entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtosMissionRecensementBundle:Mission:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Mission entity.
    *
    * @param Mission $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Mission $entity)
    {
        $form = $this->createForm(new MissionType(), $entity, array(
            'action' => $this->generateUrl('mission_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour'));

        return $form;
    }
    /**
     * Edits an existing Mission entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        // If the user is not allowed to view the mission
        if(!$this->isAllowedOnMission($id))
        {
            throw new AccessDeniedException();
        }

        // If the user is allowed to view the mission
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtosMissionRecensementBundle:Mission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mission_edit', array('id' => $id)));
        }

        return $this->render('AtosMissionRecensementBundle:Mission:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Mission entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        // If the user is not allowed to view the mission
        if(!$this->isAllowedOnMission($id))
        {
            throw new AccessDeniedException();
        }

        // If the user is allowed to view the mission
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtosMissionRecensementBundle:Mission')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mission entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mission'));
    }

    /**
     * Finds and displays the missions of an Employ entity.
     *
     */
    public function showEmployeMissionsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtosMissionRecensementBundle:Mission')->findByEmploye($id);
        $employe = $em->getRepository('AtosMissionRecensementBundle:Employe')->find($id);


        return $this->render('AtosMissionRecensementBundle:Mission:index-for-employe.html.twig', array(
            'entities' => $entities,
            'employe' => $employe->getNom() . ' ' . $employe->getPrenom(),
        ));
    }

    /**
     * Creates a form to delete a Mission entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mission_delete', array('id' => $id)))
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

    /**
     * Indicates if the current user is allowed
     * to make actions on the mission passed in parameter.
     */
    private function isAllowedOnMission($id)
    {
        // Entity manager
        $em = $this->getDoctrine()->getManager();
        
        // Admin can do everything on missions
        if (true === $this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            return true;
        }
        // Users can make actions on their own missions
        $user_id = $this->getUser()->getId();
        $mission = $em->getRepository('AtosMissionRecensementBundle:Mission')->find($id);
        if($mission != null and $user_id === $mission->getEmploye()->getId())
        {
            return true;
        }
        return false;
    }
}
