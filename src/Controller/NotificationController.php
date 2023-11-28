<?php

// src/Controller/NotificationController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController extends AbstractController
{
    #[Route('/notifications/data', name: 'app_notifications_data')]

    public function getNotificationData(): JsonResponse
    {
        $jsonFilePath = $this->getParameter('kernel.project_dir') . '/public/data/notifications.json';

        if (!file_exists($jsonFilePath)) {
            return new JsonResponse(['error' => 'Le fichier JSON n\'existe pas.'], Response::HTTP_NOT_FOUND);
        }

        $jsonContent = file_get_contents($jsonFilePath);
        $data = json_decode($jsonContent, true);

        return $this->json($data);
    }
}
