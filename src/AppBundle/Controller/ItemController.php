<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Item;
use AppBundle\Form\ItemType;

/**
 * Item controller.
 *
 * @Route("/item")
 */
class ItemController extends Controller
{
    /**
     * Lists all Item entities.
     *
     * @Route("/", name="item_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Items");

        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository('AppBundle:Item')->findAll();

        return $this->render('item/index.html.twig', array(
            'items' => $items,
        ));
    }

    /**
     * Creates a new Item entity.
     *
     * @Route("/new", name="item_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Items", $this->get("router")->generate("item_index"));
        $breadcrumbs->addItem("Create new item" );

        $item = new Item();
        $form = $this->createForm('AppBundle\Form\ItemType', $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('item_show', array('id' => $item->getId()));
        }

        return $this->render('item/new.html.twig', array(
            'item' => $item,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Item entity.
     *
     * @Route("/{id}", name="item_show")
     * @Method("GET")
     */
    public function showAction(Item $item)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Items", $this->get("router")->generate("item_index"));
        $breadcrumbs->addItem("Show item with id " . $item->getId() );

        $deleteForm = $this->createDeleteForm($item);

        return $this->render('item/show.html.twig', array(
            'item' => $item,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Item entity.
     *
     * @Route("/{id}/edit", name="item_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Item $item)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Items", $this->get("router")->generate("item_index"));
        $breadcrumbs->addItem("Edit item with id " . $item->getId() );

        $deleteForm = $this->createDeleteForm($item);
        $editForm = $this->createForm('AppBundle\Form\ItemType', $item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('item_edit', array('id' => $item->getId()));
        }

        return $this->render('item/edit.html.twig', array(
            'item' => $item,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Item entity.
     *
     * @Route("/{id}", name="item_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Item $item)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem("Items", $this->get("router")->generate("item_index"));
        $breadcrumbs->addItem("Delete item with id " . $item->getId() );

        $form = $this->createDeleteForm($item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush();
        }

        return $this->redirectToRoute('item_index');
    }

    /**
     * Creates a form to delete a Item entity.
     *
     * @param Item $item The Item entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Item $item)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', array('id' => $item->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
