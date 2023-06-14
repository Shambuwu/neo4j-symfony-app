<?php

namespace App\Controller;

use App\Entity\Node;
use App\Service\OGMClient;
use Exception;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            'results' => $client->getAllEntities()
        ]);
    }

    #[Route('/insert', name: 'app_insert', methods: ['POST'])]
    public function insertNode(OGMClient $client, ValidatorInterface $validator) {
        $node = new Node();
        $node
            ->setType("TWDIS")
            ->setExternalId("1234567890");
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

    #[Route('/api/nodes/{type}', name: 'app_get_nodes', methods: ['GET'])]
    public function getNodes(OGMClient $client, string $type): JsonResponse
    {
        $em = $client->getEntityManager();
        $nodeRepository = $em->getRepository(Node::class);
        $nodes = $nodeRepository->findBy(array('type' => $type));
        $nodesList = [];

        foreach ($nodes as $node) {
            $nodesList["nodes"][] = array(
                "id" => $node->getId(),
                "label" => $node->getType(),
                "relatedNodes" => json_encode($node->getRelatedNodes())
            );
        }

        return new JsonResponse($nodesList);
    }
}
