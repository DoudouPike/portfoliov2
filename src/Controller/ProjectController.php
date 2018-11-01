<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="projects_list")
     */
    public function index()
    {
        $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

        return $this->render('project/list.html.twig', [
            'projects' => $projects
        ]);
    }
}
