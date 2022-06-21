<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProjectRepository;
use App\Entity\Project;
 
/**
 * @Route("/api", name="api_")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project_index", methods={"GET"})
     */
    public function index(ProjectRepository $projectrepository): Response
    {
        $results = $projectrepository->findAll();
        foreach ($results as $result) {
            $data[] = [
                'id' => $result->getId(),
                'name' => $result->getName(),
                'description' => $result->getDescription(),
            ];
        }
      
        return $this->json($data);
    }
 
    /**
     * @Route("/project", name="project_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
 
        $project = new Project();
        $project->setName($request->request->get('name'));
        $project->setDescription($request->request->get('description'));
 
        $entityManager->persist($project);
        $entityManager->flush();
 
        return $this->json('Created new project successfully with id ' . $project->getId());
    }
 
    /**
     * @Route("/project/{id}", name="project_show", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $project = $this->getDoctrine()
            ->getRepository(Project::class)
            ->find($id);
 
        if (!$project) {
 
            return $this->json('No project found for id' . $id, 404);
        }
 
        $data =  [
            'id' => $project->getId(),
            'name' => $project->getName(),
            'description' => $project->getDescription(),
        ];
         
        return $this->json($data);
    }
 
    /**
     * @Route("/project/{id}", name="project_edit", methods={"PUT"})
     */
    public function edit(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(Project::class)->find($id);
 
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
 
        $project->setName($request->request->get('name'));
        $project->setDescription($request->request->get('description'));
        $entityManager->flush();
 
        $data =  [
            'id' => $project->getId(),
            'name' => $project->getName(),
            'description' => $project->getDescription(),
        ];
         
        return $this->json($data);
    }
 
    /**
     * @Route("/project/{id}", name="project_delete", methods={"DELETE"})
     */
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(Project::class)->find($id);
 
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
 
        $entityManager->remove($project);
        $entityManager->flush();
 
        return $this->json('Deleted a project successfully with id ' . $id);
    }
 
 
}
