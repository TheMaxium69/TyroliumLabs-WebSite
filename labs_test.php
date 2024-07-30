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

    var_dump($idLabsRequest);

    $sql = "SELECT * FROM labs WHERE id =:id";
    var_dump($sql);

    $stmt = $db->prepare($sql);

    $stmt->execute(['id' => $idLabsRequest]);


    $tabsSelected = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!empty($tabsSelected)) {

        var_dump($tabsSelected);
        // TU RESTE ICI

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