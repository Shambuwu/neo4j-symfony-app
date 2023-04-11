<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Neo4jClient;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(Neo4jClient $client): Response
    {
        $test = $client->getAllEntities();
        return $this->render('test/index.html.twig', [
           'results' => $client->getAllEntities()
        ]);
    }
}
