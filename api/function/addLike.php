<?php
function addLike (int $id, string $ip){
    require "app/env.php";
    require $DATABASE;

    $preparedQuery = $db->prepare("INSERT INTO `like_labs` (`idLabs`, `ip`) VALUES (?, ?)");
    $preparedQuery->execute([$id, $ip]);

    return true;

}