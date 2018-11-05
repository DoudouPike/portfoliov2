<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="App_index")
     */
    public function index()
    {
        $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

        return $this->render('index.html.twig', [
            'projects' => $projects
        ]);
    }
}
