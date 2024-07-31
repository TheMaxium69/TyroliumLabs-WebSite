<?php $page_id = 3;
require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>

    <p><?= $env_titre ?></p>

</main>


<?php $js_exemple(); ?>



<a href="http://localhost/TyroliumLabs-WebSite/labs_test.php?id=1">mon labs 1</a>
<a href="http://localhost/TyroliumLabs-WebSite/labs_test.php">mon labs 2</a>
<a href="http://localhost/TyroliumLabs-WebSite/labs_test.php?id=3">je suis super beau</a>
<a href=".">le point</a>

<?php

require $DATABASE;

if (isset($_GET['id'])) {
    $idLabsRequest = $_GET['id'];

    $sql = "SELECT * FROM labs WHERE id =:id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $idLabsRequest]);
    $tabsSelected = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($tabsSelected)) {

        var_dump($tabsSelected);

    $sqlProjects = "SELECT * FROM projectlab WHERE idlabs =:id";
    $stmtProjects = $db->prepare($sqlProjects);
    $stmtProjects->execute(['id' => $idLabsRequest]);
    $projects = $stmtProjects->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($projects)){

    var_dump($projects);

    }else {
        echo "pas de projet trouvé";
    }
  
    $sql = 'SELECT COUNT(*) FROM likes WHERE idLabs = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $idLabsRequest]);
    $totalLikes = $stmt->fetch(PDO::FETCH_ASSOC);

   

    echo 'Nombre de likes : ' . $totalLikes['COUNT(*)'];

    } else {
        // var_dump("ma parole la bdd , elle est grâve vide");
        header('Location: .');
    }
} else {

    // var_dump("je sait qu'il n'y a rien");
    header('Location: .');
}

    

?>


<?php require "@tyrositeframework/end.php"; ?>