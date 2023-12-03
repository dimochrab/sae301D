<?php

// Récupérer les données du formulaire
$data = json_decode(file_get_contents("php://input"), true);

// Traitement des données (remplacez cela par votre logique de connexion)
$connectedUserData = array(
    'prenom' => $data['prenom'],
    'nom' => $data['nom'],
    'statut' => $data['statut'],
    // Ajoutez d'autres données si nécessaire
);

// Envoyer les données au format JSON
header('Content-Type: application/json');
echo json_encode($connectedUserData);
?>
