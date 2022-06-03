<?php

namespace App\Controller;

use App\Entity\Panneaux;
use App\Entity\PanneauxEtat;
use App\Form\PanneauxType;
use App\Repository\PanneauxRepository;
use App\Repository\PanneauxEtatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panneaux")
 */
class PanneauxController extends AbstractController
{
    /**
     * @Route("/panneau", name="app_panneaux_index", methods={"GET"})
     */
    public function index(PanneauxRepository $panneauxRepository, PanneauxEtatRepository $panneauxEtatRepository): Response
    {
        
        return $this->render('panneaux/index.html.twig', [
            'panneauxes' => $panneauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_panneaux_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PanneauxRepository $panneauxRepository): Response
    {
        $panneaux = new Panneaux();
        $form = $this->createForm(PanneauxType::class, $panneaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $panneauxRepository->add($panneaux, true);

            return $this->redirectToRoute('app_panneaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panneaux/new.html.twig', [
            'panneaux' => $panneaux,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_panneaux_show", methods={"GET"})
     */
    public function show(Panneaux $panneaux): Response
    {
        return $this->render('panneaux/show.html.twig', [
            'panneaux' => $panneaux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_panneaux_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Panneaux $panneaux, PanneauxRepository $panneauxRepository): Response
    {
        $form = $this->createForm(PanneauxType::class, $panneaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $panneauxRepository->add($panneaux, true);

            return $this->redirectToRoute('app_panneaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panneaux/edit.html.twig', [
            'panneaux' => $panneaux,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_panneaux_delete", methods={"POST"})
     */
    public function delete(Request $request, Panneaux $panneaux, PanneauxRepository $panneauxRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$panneaux->getIdPa(), $request->request->get('_token'))) {
            $panneauxRepository->remove($panneaux, true);
        }

        return $this->redirectToRoute('app_panneaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
