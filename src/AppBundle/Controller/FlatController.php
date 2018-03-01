<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Flat;
use AppBundle\Entity\Image;
use AppBundle\Repository\FlatRepository;
use AppBundle\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

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
            /** @var UploadedFile $file */
            $file = $flat->getImages();

            //var_dump($flat);
            /** @var $repoImg ImageRepository */
            /** @var $repoFlat FlatRepository */
            $repoImg = $this->getDoctrine()->getRepository(Image::class);
            $repoFlat = $this->getDoctrine()->getRepository(Flat::class);

            // test pour savoir si une image est passer
            if (is_object($form->get('images')->getData())) {
                $image = new Image();
                $fileName = $flat->getName() . '_' . $file->getClientOriginalName();
                $image->setFlat($flat);
                $image->setName($fileName);
                $image->setPath($this->getParameter('image_directory') . '\\' . $flat->getName() . '\\' . $fileName);

                // Test pour savoir si l'appartement et l'image existe déja
                if (is_null($repoImg->isExist($image)) && is_null($repoFlat->isExist($flat))) {
                    $file->move($this->getParameter('image_directory') . '/' . $flat->getName(), $fileName);

                    /** @var ArrayCollection|Image[] $newArray */
                    $newArray = new ArrayCollection([$image]);

                    $flat->setImages($newArray);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($image);
                    $em->persist($flat);
                    $em->flush();

                    return $this->redirectToRoute('admin-panel_flat_index');
                } else {
                    if (!is_null($repoImg->isExist($image)))
                        $form->addError(new FormError('Image déja existante'));
                    if (!is_null($repoFlat->isExist($flat)))
                        $form->addError(new FormError('Appartement déja existant'));
                }
            } else {

                if (is_null($repoFlat->isExist($flat))) {
                    /** @var ArrayCollection|Image[] $newArray */
                    $newArray = new ArrayCollection();
                    $flat->setImages($newArray);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($flat);
                    $em->flush();
                    return $this->redirectToRoute('admin-panel_flat_index');
                } else {
                    $form->addError(new FormError('Appartement déja existant'));
                }

            }

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
            /** @var UploadedFile $file */
            $file = $flat->getImages();

            /** @var $repoImg ImageRepository */
            /** @var $repoFlat FlatRepository */
            $repoImg = $this->getDoctrine()->getRepository(Image::class);

            if (is_object($editForm->get('images')->getData())) {
                $image = new Image();
                $fileName = $flat->getName() . '_' . $file->getClientOriginalName();
                $image->setFlat($flat);
                $image->setName($fileName);
                $image->setPath($this->getParameter('image_directory') . '\\' . $flat->getName() . '\\' . $fileName);

                if (is_null($repoImg->isExist($image))) {
                    $file->move($this->getParameter('image_directory') . '/' . $flat->getName(), $fileName);

                    /** @var ArrayCollection|Image[] $newArray */
                    $newArray = new ArrayCollection([$image]);

                    $flat->setImages($newArray);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($image);
                    $em->persist($flat);
                    $em->flush();
                } else {
                    $editForm->addError(new FormError('Image déja existante'));
                }
            } else {
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin-panel_flat_index', array('id' => $flat->getId()));
            }
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
            ->getForm();
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
