<?php

namespace App\Controller;

use App\Entity\Remplacements;
use App\Form\RemplacementsType;
use App\Repository\RemplacementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/remplacements")
 */
class RemplacementsController extends AbstractController
{
    /**
     * @Route("/", name="app_remplacements_index", methods={"GET"})
     */
    public function index(RemplacementsRepository $remplacementsRepository): Response
    {
        return $this->render('remplacements/index.html.twig', [
            'remplacements' => $remplacementsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_remplacements_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RemplacementsRepository $remplacementsRepository): Response
    {
        $remplacement = new Remplacements();
        $form = $this->createForm(RemplacementsType::class, $remplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remplacementsRepository->add($remplacement, true);

            return $this->redirectToRoute('app_remplacements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remplacements/new.html.twig', [
            'remplacement' => $remplacement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_remplacements_show", methods={"GET"})
     */
    public function show(Remplacements $remplacement): Response
    {
        return $this->render('remplacements/show.html.twig', [
            'remplacement' => $remplacement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_remplacements_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Remplacements $remplacement, RemplacementsRepository $remplacementsRepository): Response
    {
        $form = $this->createForm(RemplacementsType::class, $remplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remplacementsRepository->add($remplacement, true);

            return $this->redirectToRoute('app_remplacements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remplacements/edit.html.twig', [
            'remplacement' => $remplacement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_remplacements_delete", methods={"POST"})
     */
    public function delete(Request $request, Remplacements $remplacement, RemplacementsRepository $remplacementsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$remplacement->getId(), $request->request->get('_token'))) {
            $remplacementsRepository->remove($remplacement, true);
        }

        return $this->redirectToRoute('app_remplacements_index', [], Response::HTTP_SEE_OTHER);
    }
}
