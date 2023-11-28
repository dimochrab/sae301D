<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{

    #[Route('/recherche', name: 'app_recherche')]

    public function index(): Response
    {
        // Les données que vous avez fournies
        $events = [
            [
                "title" => "WR301 & WR302 - English S3",
                "start" => "2023-11-28T18:00:00",
                "status" => "En Cours"
            ],
            [
                "title" => "R312 - Integration web",
                "start" => "2024-01-02T17:00:00",
                "status" => "Rendus"
            ],
            [
                "title" => "WR308 - Écriture multimédia et narration",
                "start" => "2024-04-15T23:59:00",
                "status" => "Non Rendus"
            ],
            [
                "title" => "WR313 - Développement Back",
                "start" => "2024-02-10T20:00:00",
                "status" => "En Cours"
            ],
            [
                "title" => "WR310 - Culture artistique",
                "start" => "2024-05-05T18:00:00",
                "status" => "Rendus"
            ],
            [
                "title" => "WR303 UX design d'expérience",
                "start" => "2024-03-20T17:00:00",
                "status" => "Non Rendus"
            ],
            [
                "title" => "WR309 Création et design interactif (UI)",
                "start" => "2023-12-31T23:59:00",
                "status" => "En Cours"
            ],
            [
                "title" => "R304 - Culture numérique - J. Thomas",
                "start" => "2024-06-14T20:00:00",
                "status" => "Rendus"
            ],
            [
                "title" => "R315 - Maths matrices",
                "start" => "2024-05-29T18:00:00",
                "status" => "Non Rendus"
            ],
        ];

        // On encode en JSON
        $events = json_encode($events);

        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'events' => $events,
        ]);
    }
}
