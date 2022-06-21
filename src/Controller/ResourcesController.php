<?php

namespace App\Controller;

use App\Entity\Resources;
use App\Form\ResourcesType;
use App\Repository\ResourcesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resources")
 */
class ResourcesController extends AbstractController
{
    /**
     * @Route("/", name="app_resources_index", methods={"GET"})
     */
    public function index(ResourcesRepository $resourcesRepository): Response
    {
        return $this->render('resources/index.html.twig', [
            'resources' => $resourcesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_resources_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ResourcesRepository $resourcesRepository): Response
    {
        $resource = new Resources();
        $form = $this->createForm(ResourcesType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resourcesRepository->add($resource, true);

            return $this->redirectToRoute('app_resources_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('resources/new.html.twig', [
            'resource' => $resource,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_resources_show", methods={"GET"})
     */
    public function show(Resources $resource): Response
    {
        return $this->render('resources/show.html.twig', [
            'resource' => $resource,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_resources_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Resources $resource, ResourcesRepository $resourcesRepository): Response
    {
        $form = $this->createForm(ResourcesType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resourcesRepository->add($resource, true);

            return $this->redirectToRoute('app_resources_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('resources/edit.html.twig', [
            'resource' => $resource,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_resources_delete", methods={"POST"})
     */
    public function delete(Request $request, Resources $resource, ResourcesRepository $resourcesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resource->getId(), $request->request->get('_token'))) {
            $resourcesRepository->remove($resource, true);
        }

        return $this->redirectToRoute('app_resources_index', [], Response::HTTP_SEE_OTHER);
    }
}
