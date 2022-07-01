<?php

namespace App\Controller;


use App\Entity\Panneaux;
use App\Form\PanneauxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\PanneauxRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="app_search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
/**
     * @Route("/searcha", name="app_search")
     */
public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add('query', EntityType::class, [
                'class' => Panneaux::class,
                'choice_label' => 'NomPa',
                'placeholder' => 'Panneaux',
                'label' => 'Panneaux',
                'attr' => [
                    'class' => 'select-tag'
                ],
            
                
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
        return $this->render('search/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/handleSearch", name="handleSearch")
     * @param Request $request
     */
    public function handleSearch(Request $request,PanneauxRepository $panneauxRepository)
    {
        $query = $request->request->get('form')['query'];
        if($query) {
            $panneauxes = $panneauxRepository->findPanneauxByName($query);
        }
        return $this->render('Panneaux/index.html.twig', [
            'panneauxes' => $panneauxes,
             
        ]);
    }
}