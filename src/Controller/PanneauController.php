<?php

namespace App\Controller;

use App\Entity\Panneau;
use App\Form\PanneauType;
use App\Repository\PanneauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/panneau")
 */
class PanneauController extends AbstractController
{
    /**
     * @Route("/panneau", name="app_panneau_index", methods={"GET"})
     */
    public function index(PanneauRepository $panneauRepository): Response
    {
        return $this->render('panneau/index.html.twig', [
            'panneaus' => $panneauRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="app_panneau_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PanneauRepository $panneauRepository): Response 
    {
        $panneau = new Panneau();
        $form = $this->createForm(PanneauType::class, $panneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $Photo = $form->get('pc')->getData();
            $file = md5(uniqid()) . '.' . $Photo->guessExtension();
            $Photo->move(
                $this->getParameter('pc_directrory'),
                $file
            );
            $img = $form->get('Specs')->getData();
            $fi = md5(uniqid()) . '.' . $img->guessExtension();
            $img->move(
                $this->getParameter('pc_directrory'),
                $fi
            );
            $Phot = $form->get('Emplacementbox')->getData();
            $fil = md5(uniqid()) . '.' . $Phot->guessExtension();
            $Phot->move(
                $this->getParameter('pc_directrory'),
                $fil
            );
            $panneau->setSpecs($fi);
            $panneau->setEmplacementbox($fil);
            $panneau->setpc($file);
            $panneauRepository->add($panneau, true);
           

            return $this->redirectToRoute('app_panneau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panneau/new.html.twig', [
            'panneau' => $panneau,
            'Panneauform' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_panneau_show", methods={"GET"})
     */
    public function show(Panneau $panneau): Response
    {
        return $this->render('panneau/show.html.twig', [
            'panneau' => $panneau,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_panneau_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Panneau $panneau, PanneauRepository $panneauRepository): Response
    {
        $form = $this->createForm(PanneauType::class, $panneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $panneauRepository->add($panneau, true);

            return $this->redirectToRoute('app_panneau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panneau/edit.html.twig', [
            'panneau' => $panneau,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_panneau_delete", methods={"POST"})
     */
    public function delete(Request $request, Panneau $panneau, PanneauRepository $panneauRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$panneau->getId(), $request->request->get('_token'))) {
            $panneauRepository->remove($panneau, true);
        }

        return $this->redirectToRoute('app_panneau_index', [], Response::HTTP_SEE_OTHER);
    }

}
