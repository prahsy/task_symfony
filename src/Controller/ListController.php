<?php

namespace App\Controller;

use App\Form\ShoppingListType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Alphabetizer;

class ListController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index()
    {
        $form = $this->createForm(ShoppingListType::class);

        return $this->render('index/index.html.twig', ['title'=> 'Make A Shopping List',
            'list'=> 'Here is the list',
            'listForm'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/list", name="listDisplay")
     */
    public function display(Request $request)
    {

        $form = $this->createForm(ShoppingListType::class);

        $form->handleRequest($request);

           if($form->isSubmitted() && $form->isValid())
           {
               $data = $form->getData();
               $name = $data['name'];
               $list= $data['list'];


               $this->addFlash('success', 'List has been created');
           }

           $alphabetizer = new Alphabetizer($list);

           $list = $alphabetizer->sortAsc();

        return $this->render('list/index.html.twig', ['title'=> 'Shopping List',
            'list'=> 'Here is the list',
            'name'=> $name,
            'shoppingList'=> $list,

        ]);

    }
}
