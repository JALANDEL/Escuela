<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AulaController extends AbstractController
{
    #[Route('/aula', name: 'app_aula')]
    public function index(): Response
    {
        return $this->render('aula/index.html.twig', [
            'controller_name' => 'AulaController',
        ]);
    }
}
