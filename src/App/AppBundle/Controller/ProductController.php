<?php

namespace App\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\AppBundle\Entity\Product;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')->findAll();
        $categorys = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('AppBundle:Product:index.html.twig', array(
            'products' => $products,
            'categorys' => $categorys,
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($name)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em
                ->getRepository('AppBundle:Product')
                ->findOneBy(array('name'=>$name));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        return $this->render('AppBundle:Product:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
