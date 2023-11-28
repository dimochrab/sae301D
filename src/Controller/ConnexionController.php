<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(Request $request): Response
    {
        $utilisateurs = [
            [
                "prenom" => "mouad",
                "nom" => "el-khalifi",
                "mdp" => "123456",
                "statut" => "Etudiant"
            ],
            [
                "prenom" => "Adem",
                "nom" => "BEN KHEDHER",
                "mdp" => "123456",
                "statut" => "Etudiant"
            ],
            [
                "prenom" => "Ahamad",
                "nom" => "MOHAMMAD",
                "mdp" => "123456",
                "statut" => "Etudiant"
            ],
            [
                "prenom" => "David",
                "nom" => "ANNEBICQUE",
                "mdp" => "123456",
                "statut" => "Professeur"
            ]
        ];

        // Vous pouvez traiter $utilisateurs comme bon vous semble dans votre logique

        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
            'utilisateurs' => $utilisateurs, // Passer la liste des utilisateurs au modÃ¨le
        ]);
    }
}