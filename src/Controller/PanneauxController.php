<?php

namespace App\Controller;

use App\Entity\Panneaux;
use App\Form\PanneauxType;
use App\Repository\PanneauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panneaux")
 */
class PanneauxController extends AbstractController
{
    /**
     * @Route("/panneau", name="app_panneaux_index", methods={"GET"})
     */
    public function index(PanneauxRepository $panneauxRepository): Response
    {
        
        return $this->render('panneaux/index.html.twig', [
            'panneauxes' => $panneauxRepository->findAll(),
        ]);
    }
    /**
     * @Route("/api/get", name="app_panneaux_index", methods={"GET"})
     */
    public function api(PanneauxRepository $panneauxRepository): Response
    {
        
        $results = $panneauxRepository->findAll();

        foreach ($results as $result) {
            
            $data[] = [ 
                
                'id_panneaux' => $result->getIdPa(),
                'nom_panneau' => $result->getNomPa(),
                'groupe' => $result->getGroupeId(),
                'ID_client' => $result->getIp(),
                'email_client' => $result->getUrl(),
                'adresse' => $result->getAdressePa(),
                'Gps' => $result->getGps(),
                'photo' => $result->getPhoto(),
                'resolution' => $result->getResolution(),
                'resolution_video' => $result->getResolutionVideo(),
                'XY' => $result->getXY(),
                'pitch' => $result->getPitch(),
                'Type' => $result->getType(),
                'cropping' => $result->getCropping(),
                'secteur' => $result->getPaPtId(),
                'NbResaMax' => $result->getNbResaMax(),
            ];
          
           
        }
        echo json_encode(array("Panels" => $data));
        return $this->json('name',$data);
    }
    /**
     * @Route("/api/post", name="project_new", methods={"POST"})
     */
    public function add(Request $request,PanneauxRepository $panneauxRepository): Response
    {
       
        
        $project = new Panneaux();
        $parameter = json_decode($request->getContent(),true);
       
        $project->setNomPa($parameter["nom_panneau"]);
        $project->setIp($parameter["ID_client"]);
        $project->setGroupeId($parameter["groupe"]);
        $project->setUrl($parameter["email_client"]);
        $project->setAdressePa($parameter["adresse"]);
        $project->setGps($parameter["Gps"]);
        $project->setPhoto($parameter["photo"]);
        $project->setResolution($parameter["resolution"]);
        $project->setXY($parameter["XY"]);
        $project->setResolutionVideo($parameter["resolution_video"]);
        $project->setPitch($parameter["pitch"]);
        $project->setType($parameter["type"]);
        $project->setCropping($parameter["cropping"]);
        $project->setPaPtId($parameter["secteur"]);
        $project->setNbResaMax($parameter["NbResaMax"]);
        $panneauxRepository->add($project, true);
 
        return $this->json('Created new project successfully with id ' . $project->getIdPa());
    }
   /**
     * @Route("/api/update/{idpa}", name="project_new", methods={"PUT"})
     */
    public function update(Request $request,PanneauxRepository $panneauxRepository, $idpa): Response
    {
       
        $results = $panneauxRepository->find($idpa);
        $parameter = json_decode($request->getContent(),true);
       
        $results->setNomPa($parameter["nom_panneau"]);
        $results->setIp($parameter["ID_client"]);
        $results->setGroupeId($parameter["groupe"]);
        $results->setUrl($parameter["email_client"]);
        $results->setAdressePa($parameter["adresse"]);
        $results->setGps($parameter["Gps"]);
        $results->setPhoto($parameter["photo"]);
        $results->setResolution($parameter["resolution"]);
        $results->setXY($parameter["XY"]);
        $results->setResolutionVideo($parameter["resolution_video"]);
        $results->setPitch($parameter["pitch"]);
        $results->setType($parameter["type"]);
        $results->setCropping($parameter["cropping"]);
        $results->setPaPtId($parameter["secteur"]);
        $results->setNbResaMax($parameter["NbResaMax"]);
        $panneauxRepository->add($results, true);
 
        return $this->json('Updated successfully with id ' . $results->getIdPa());
    }
       /**
     * @Route("/api/delete/{idpa}", name="project_new", methods={"DELETE"})
     */
    public function remove(Request $request,PanneauxRepository $panneauxRepository, $idpa): Response
    {
       
        $results = $panneauxRepository->find($idpa);
        $panneauxRepository->remove($results, true);
 
        return $this->json('Deleted successfully with id ' . $results->getIdPa());
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
