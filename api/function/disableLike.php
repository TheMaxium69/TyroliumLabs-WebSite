<?php
function disableLike(int $id, string $token_navigateur){
    require "app/env.php";
    require $DATABASE;

    $preparedQuery = $db->prepare("DELETE FROM `like_labs` WHERE `idLabs` = ? AND `token_navigateur` = ?");
    $preparedQuery->execute([$id, $token_navigateur]);

    return true;

}