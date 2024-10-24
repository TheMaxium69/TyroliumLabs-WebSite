<?php

function getAllLabs() {
    require '../../app/database.dev.php';

    $query = $db->query('SELECT * FROM labs');
    $labAll = $query->fetchAll(PDO::FETCH_ASSOC);
    $tempLabAll = [];

    foreach ($labAll as $lab) {
        $stmt = $db->prepare('SELECT pictureUrl FROM picture WHERE id = :id');

        $stmt->execute(['id' => $lab['iconeId']]);
        $iconeUrl = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->execute(['id' => $lab['backgroundId']]);
        $backgroundUrl = $stmt->fetch(PDO::FETCH_ASSOC);

        $lab['iconeUrl'] = $iconeUrl['pictureUrl'];
        $lab['backgroundUrl'] = $backgroundUrl['pictureUrl'];

        array_push($tempLabAll, $lab);
    }

//    var_dump($tempLabAll);
    return $tempLabAll;
}

