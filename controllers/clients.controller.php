<?php
require_once "../orm.php";
require_once "../modals/client.model.php";
// $data= jsonToArray1('clients');

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
    if ($page == "ajout") {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout'])) {
            $data = jsonToArray1('clients');
            $tel = $_POST['tel'] ?? '';
            $nom = $_POST['nom'] ?? '';
            $adresse = $_POST['adresse'] ?? '';
            $montant = $_POST['montant'] ?? '';
            $date = $_POST['date'] ?? '';
            $etat = $_POST['etat'] ?? '';
            if (empty($telephone)) {
        $errors['tel'] = "Le téléphone est obligatoire.";
    }
    if (empty($nom)) {
        $errors['nom'] = "Le nom est obligatoire.";
    }else{
        unset($errors['tel']);
    }
    if (empty($adresse)) {
        $errors['adresse'] = "L'adresse est obligatoire.";
    }
    if (empty($montant)) {
        $errors['montant'] = "Le montant est obligatoire.";
    }
    if (empty($date)) {
        $errors['date'] = "La date est obligatoire.";
    }
    if (empty($etat)) {
        $errors['etat'] = "L'état est obligatoire.";
    }
            if (!empty($telephone)) {
                foreach ($data['clients'] as $client) {
                    if ($client['telephone'] === $telephone) {
                        $errors[] = "Le numéro de téléphone doit être unique.";
                        break;
                    }
                }
            }
            if (!empty($montant) && $montant <= 0) {
                $errors['montant'] = "Le montant doit être positif.";
            }
        
        
            // Ajouter un nouveau client
            if (empty($errors)) {
                $newClient = [
                    'id' => (count($data) + 1),
                    'nom' => $_POST['nom'],
                    'tel' => $_POST['tel'],
                    'adresse' => $_POST['adresse']
                ];
                $data[] = $newClient;
                // Ajouter une nouvelle dette
                $data = jsonToArray1('dettes');
                $newDette = [
                    'dette_id' => (count($data) + 1),
                    'montant' => $_POST['montant'],
                    'date' => $_POST['date'],
                    'client_id' => $newClient['id'],
                    'etat' => $_POST['etat']
                ];
                $articles = [];
                if (is_array($articles)) {
                    foreach ($articles as $article) {
                        $quantite = $_POST['quantite_' . $article] ?? 0;
                        $dette['articles'][] = [
                            'reference' => $article,
                            'quantite' => $quantite
                        ];
                    }
                } else {
                    die("Erreur : les articles ne sont pas disponibles.");
                }
    
                $data[] = $newDette;
                file_put_contents('../data/data.json', json_encode($data, JSON_PRETTY_PRINT));
                sauvegarderDonnees($data);
                // require_once "../views/client/ajout_client_dette.html.php";
                header('location:?controller=clients&page=liste');
            }
            }
    }elseif ($page== "liste") {
        // $data = jsonToArray1('data.json');
        $clients=jsonToArray1('clients');
        $dettes=jsonToArray1('dettes');
        require_once "../views/client/list.html.php";
    }
}else{

    require_once "../views/client/ajout_client_dette.html.php";
}
