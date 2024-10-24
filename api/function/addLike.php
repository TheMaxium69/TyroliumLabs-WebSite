<?php
function addLike (int $id, string $ip){
    require 'app/database.dev.php';

    $preparedQuery = $db->prepare("INSERT INTO `like_labs` (`idLabs`, `ip`) VALUES (?, ?)");
    $preparedQuery->execute([$id, $ip]);

    return true;

}