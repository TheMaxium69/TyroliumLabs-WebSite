<?php
require_once './app/database.dev.php';
function getOneLabs(int $labsId): Array {

    $stmt = $GLOBALS['db']->prepare('SELECT labs.*, icone.pictureUrl AS icon_url, background.pictureUrl AS background_url FROM labs JOIN picture AS icone ON labs.iconeId = icone.id JOIN picture AS background ON labs.backgroundId = background.id WHERE labs.id = ?');
    $stmt->execute([$labsId]);
    $results = $stmt->fetch();
    if(!$results) throw new Exception("Page non trouvé");
    var_dump($results);
    return $results;

}
