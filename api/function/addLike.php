<?php
function addLike (int $id, string $ip){
    require __DIR__.'app\database.dev.php' ;

    $preparedQuery = $db->prepare("INSERT INTO `like_labs` (`idLabs`, `ip`) VALUES (?, ?)");
    $preparedQuery->execute([$id, $ip]);

    return true;

}