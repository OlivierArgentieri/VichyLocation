<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Renting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Renting controller.
 *
 * @Route("admin-panel/renting")
 */
class RentingController extends Controller
{
    /**
     * Lists all renting entities.
     *
     * @Route("/", name="admin-panel_renting_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rentings = $em->getRepository('AppBundle:Renting')->findAll();

        return $this->render('renting/index.html.twig', array(
            'rentings' => $rentings,
        ));
    }

    /**
     * Creates a new renting entity.
     *
     * @Route("/new", name="admin-panel_renting_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $renting = new Renting();
        $form = $this->createForm('AppBundle\Form\RentingType', $renting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($renting);
            $em->flush();

            return $this->redirectToRoute('admin-panel_renting_show', array('id' => $renting->getId()));
        }

        return $this->render('renting/new.html.twig', array(
            'renting' => $renting,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a renting entity.
     *
     * @Route("/{id}", name="admin-panel_renting_show")
     * @Method("GET")
     */
    public function showAction(Renting $renting)
    {
        $deleteForm = $this->createDeleteForm($renting);

        return $this->render('renting/show.html.twig', array(
            'renting' => $renting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing renting entity.
     *
     * @Route("/{id}/edit", name="admin-panel_renting_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Renting $renting)
    {
        $deleteForm = $this->createDeleteForm($renting);
        $editForm = $this->createForm('AppBundle\Form\RentingType', $renting);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin-panel_renting_edit', array('id' => $renting->getId()));
        }

        return $this->render('renting/edit.html.twig', array(
            'renting' => $renting,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a renting entity.
     *
     * @Route("/{id}", name="admin-panel_renting_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Renting $renting)
    {
        $form = $this->createDeleteForm($renting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($renting);
            $em->flush();
        }

        return $this->redirectToRoute('admin-panel_renting_index');
    }

    /**
     * Creates a form to delete a renting entity.
     *
     * @param Renting $renting The renting entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Renting $renting)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin-panel_renting_delete', array('id' => $renting->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
