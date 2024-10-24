<?php


function getProjectByLabs(int $id){
    require 'app/env.php';
    require $DATABASE;

    $query = $db->prepare("SELECT * FROM project_use WHERE idLabs = ?");
    $query->execute([$id]);
    $projectAll = $query->fetchAll(PDO::FETCH_ASSOC);
    // $projects = [];

    // foreach ($projectAll as $project){
    //     array_push($projects, $project);
    // }

    // return $projects;
    return $projectAll;
}

?>