<?php

namespace App\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\AppBundle\Entity\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Category')->findAll();

        return $this->render('AppBundle:Category:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($name)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em
                ->getRepository('AppBundle:Category')
                ->findOneBy(array('name'=>$name));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }
        $products = $entity->getProducts();
        return $this->render('AppBundle:Category:show.html.twig', array(
            'entity'      => $entity,
            'products'      => $products,
        ));
    }
}
