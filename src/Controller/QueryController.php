<?php

namespace App\Controller;

use App\Entity\Node;
use App\Service\OGMClient;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class QueryController extends AbstractController
{
    /**
     * @throws Exception
     */
    #[Route('/query', name: 'app_query', methods: ['GET'])]
    public function index(OGMClient $client): Response
    {
        return $this->render('data/index.html.twig', [
            'results' => $client->getALlEntities()
        ]);
    }

    #[Route('/query', name: 'app_query', methods: ['POST'])]
    public function insertNode(OGMClient $client, ValidatorInterface $validator) {
        $node = new Node();
        $node->setType("TWDIS");
        $node->setExternalId("1234567890");
        $errors = $validator->validate($node);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $client->getEntityManager();
        $em->persist($node);
        $em->flush();

        return new Response("Successfully inserted node");
    }
}
