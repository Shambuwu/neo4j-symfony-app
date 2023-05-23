<?php

namespace App\Controller;

use App\Service\Neo4jClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_data', methods: ['GET'])]
    public function index(Neo4jClient $client): Response
    {
        return $this->render('data/index.html.twig', [
            'results' => $client->getAllEntities()
        ]);
    }
}
