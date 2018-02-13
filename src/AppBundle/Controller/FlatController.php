<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Flat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Flat controller.
 *
 * @Route("admin-panel/flat")
 */
class FlatController extends Controller
{
    /**
     * Lists all flat entities.
     *
     * @Route("/", name="admin-panel_flat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $flats = $em->getRepository('AppBundle:Flat')->findAll();

        return $this->render('flat/index.html.twig', array(
            'flats' => $flats,
        ));
    }

    /**
     * Creates a new flat entity.
     *
     * @Route("/new", name="admin-panel_flat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $flat = new Flat();
        $form = $this->createForm('AppBundle\Form\FlatType', $flat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flat);
            $em->flush();

            return $this->redirectToRoute('admin-panel_flat_show', array('id' => $flat->getId()));
        }

        return $this->render('flat/new.html.twig', array(
            'flat' => $flat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a flat entity.
     *
     * @Route("/{id}", name="admin-panel_flat_show")
     * @Method("GET")
     */
    public function showAction(Flat $flat)
    {
        $deleteForm = $this->createDeleteForm($flat);

        return $this->render('flat/show.html.twig', array(
            'flat' => $flat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing flat entity.
     *
     * @Route("/{id}/edit", name="admin-panel_flat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Flat $flat)
    {
        $deleteForm = $this->createDeleteForm($flat);
        $editForm = $this->createForm('AppBundle\Form\FlatType', $flat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin-panel_flat_edit', array('id' => $flat->getId()));
        }

        return $this->render('flat/edit.html.twig', array(
            'flat' => $flat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a flat entity.
     *
     * @Route("/{id}", name="admin-panel_flat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Flat $flat)
    {
        $form = $this->createDeleteForm($flat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flat);
            $em->flush();
        }

        return $this->redirectToRoute('admin-panel_flat_index');
    }

    /**
     * Creates a form to delete a flat entity.
     *
     * @param Flat $flat The flat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Flat $flat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin-panel_flat_delete', array('id' => $flat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
