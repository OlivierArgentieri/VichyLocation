<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Flat;
use AppBundle\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{id}/show_flat", name="showflat")
     */
    public function showFlatAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->query->get('id');
        $flat = $em->getRepository(Flat::class)->find( 1);

        return $this->render('default/show_flat.html.twig', array(
            'flat' => $flat
        ));
        // replace this example code with whatever you need
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $flats = $em->getRepository(Flat::class)->findAll();

        $images = $em->getRepository(Image::class)->findAll();
        return $this->render('default/index.html.twig', array(
            'flats' => $flats,
            'images' => $images,
        ));
        // replace this example code with whatever you need

    }

    /**
    * @Route("/admin-panel/", name="adminindex")
    */
    public function adminIndexPageAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('admin/index.html.twig');
    }

}
