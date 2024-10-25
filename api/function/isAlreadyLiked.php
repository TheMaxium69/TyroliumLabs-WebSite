<?php 
    function isAlreadyLiked(int $idLabs, string $token_navigateur) {
        require "app/env.php";
        require $DATABASE;

        $check = $db->prepare("SELECT * FROM `like_labs` WHERE `idLabs` = ? AND `token_navigateur` = ?");
        $check->execute([$idLabs,$token_navigateur]);

        $result = $check->fetch();

        if ($result) {
            return true;
        }

        return false;
    }