<?php

namespace App\Controller;
use App\Entity\panneau;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
     
    /**
     * @Route("/admin", name="app_home")
     */
    public function index(): Response
    {
        
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            
        ]);
    }
}
