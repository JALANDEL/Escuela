<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IdiomaController extends AbstractController
{
    #[Route('/idioma', name: 'app_idioma')]
    public function index(): Response
    {
        return $this->render('idioma/index.html.twig', [
            'controller_name' => 'IdiomaController',
        ]);
    }
}
