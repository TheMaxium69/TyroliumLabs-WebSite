<?php

getOneLabs(1);

function getOneLabs(int $labsId) {
    require '../../app/database.dev.php';

    $stmt = $db->prepare('SELECT labs.*, icone.pictureUrl AS icon_url, background.pictureUrl AS background_url FROM labs JOIN picture AS icone ON labs.iconeId = icone.id JOIN picture AS background ON labs.backgroundId = background.id WHERE labs.id = ?');
    $stmt->execute([$labsId]);
    $results = $stmt->fetch();
//    var_dump($results);
    return $results;

}
