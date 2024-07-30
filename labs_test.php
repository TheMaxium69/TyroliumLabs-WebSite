<?php $page_id = 3;
require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>

    <p><?= $env_titre ?></p>

</main>


<?php $js_exemple(); ?>



<a href="http://localhost/TyroliumLabs-WebSite/labs_test.php?id=1">mon labs 1</a>
<a href="http://localhost/TyroliumLabs-WebSite/labs_test.php?id=2">mon labs 2</a>
<a href="http://localhost/TyroliumLabs-WebSite/labs_test.php?id=3">je suis super beau</a>

<?php

$idLabsRequest = $_GET['id'];

var_dump($idLabsRequest);

$sql = "SELECT * FROM users WHERE id =id".$idLabsRequest;

$stmt = $db->prepare($sql);

$stmt->execute(['id' =>$idLabsRequest]);


$tabsSelected = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($tabsSelected);


?>


<?php require "@tyrositeframework/end.php"; ?>