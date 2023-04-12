<?php

namespace App\Controller;

use App\Service\Neo4jClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataController extends AbstractController
{
    #[Route('/', name: 'app_data')]
    public function index(Neo4jClient $client): Response
    {
        return $this->render('data/index.html.twig', [
            'results' => $client->getAllEntities()
        ]);
    }
}
