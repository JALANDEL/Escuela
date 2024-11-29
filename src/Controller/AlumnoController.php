<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlumnoController extends AbstractController
{
    #[Route('/alumno', name: 'app_alumno')]
    public function index(): Response
    {
        return $this->render('alumno/index.html.twig', [
            'controller_name' => 'AlumnoController',
        ]);
    }
}


