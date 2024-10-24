<?php



function countLike(int $idLabs) {
    require "app/env.php";
    require $DATABASE;

    $stmt = $db->prepare('SELECT COUNT(*) AS total FROM like_labs WHERE idLabs = ?');
    $stmt->execute([$idLabs]);
    
    $results = $stmt->fetch();
    $total = $results['total'];

    return $total;

}






