<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProjectController
 * @package App\Controller
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/admin/projects", name="Project_list")
     */
    public function list()
    {
        $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

        return $this->render('project/list.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/admin/project/create", name="Project_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            $this->addFlash('success', 'Project create');

            return $this->redirectToRoute('Project_list');
        }

        return $this->render('project/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
