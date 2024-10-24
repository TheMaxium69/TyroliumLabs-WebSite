<?php
function addLike (int $id, string $token_navigateur){
    require "app/env.php";
    require $DATABASE;

    $preparedQuery = $db->prepare("INSERT INTO `like_labs` (`idLabs`, `token_navigateur`) VALUES (?, ?)");
    $preparedQuery->execute([$id, $token_navigateur]);

    return true;

}