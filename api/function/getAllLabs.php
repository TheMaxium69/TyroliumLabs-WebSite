<?php

function getAllLabs() {
    require 'app/database.dev.php';

    $query = $db->query('SELECT * FROM labs');
    $labs = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($labs as $lab) {
        $stmt = $db->prepare('SELECT pictureUrl FROM picture WHERE id = :id');

        $stmt->execute(['id' => $lab['iconeId']]);
        $iconeUrl = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->execute(['id' => $lab['backgroundId']]);
        $backgroundUrl = $stmt->fetch(PDO::FETCH_ASSOC);

        var_dump($iconeUrl);
        var_dump($backgroundUrl);

        $lab['iconeUrl'] = $iconeUrl['pictureUrl'];
        $lab['backgroundUrl'] = $backgroundUrl['pictureUrl'];

        var_dump($lab);
    }

    var_dump($labs);
    return $labs;
}

getAllLabs();
