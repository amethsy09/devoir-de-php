<?php

function findAllClients()
{ 
    $clients = jsonToArray1('clients');
    $_SESSION['clients'] = $clients; 
    return $_SESSION['clients'];
}

function getClientByTel($tel)
{
    $clients = findAllClients();
    foreach ($clients as $client) {
        if ($client['tel'] == $tel) { 
            return $client;
        }
    }
    return null; // 
}
function sauvegarderDonnees($data)
{
    file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT));
}