<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProjectController
 * @package App\Controller
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

        return $this->render('project/list.html.twig', [
            'projects' => $projects
        ]);
    }
}
