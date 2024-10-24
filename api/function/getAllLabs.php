<?php

function getAllLabs() {
    require 'app/database.dev.php';

    $query = $db->query('SELECT * FROM labs');
    $labs = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($labs as $lab) {
        $stmt = $db->prepare('SELECT pictureUrl FROM pictures WHERE id = :id');
        $stmt->execute(['id' => $lab['id']]);
        $picture = $stmt->fetch(PDO::FETCH_ASSOC);

        $lab['iconeUrl'] = $picture['pictureUrl'];
        $lab['backgroundUrl'] = $picture['pictureUrl'];
    }

    var_dump($labs);
        
    return $labs;

}
