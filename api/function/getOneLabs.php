<?php

function getOneLabs(int $labsId) {
    require "app/env.php";
    require $DATABASE;

    $stmt = $db->prepare('SELECT labs.*, icone.pictureUrl AS icon_url, background.pictureUrl AS background_url FROM labs JOIN picture AS icone ON labs.iconeId = icone.id JOIN picture AS background ON labs.backgroundId = background.id WHERE labs.id = ?');
    $stmt->execute([$labsId]);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
//    var_dump($results);

    $likes = countLike($labsId);
    $results['likes'] = $likes;

    return $results;

}
