<?php $page_id = 1;
require "@tyrositeframework/start.php"; ?>

<?php
require $DATABASE;

/******
  LABS
 ******/
$sql = "SELECT * FROM labs";

$stmt = $db->prepare($sql);

$stmt->execute();

$allLabs = $stmt->fetchAll(PDO::FETCH_ASSOC);

/******
  TOKEN
 ******/

if (!empty($_COOKIE['tokenUser'])) {

    $tokenNavigateur = $_COOKIE['tokenUser'];
} else {

    $token = md5(uniqid() . uniqid());
    setcookie(
        'tokenUser',
        $token
    );
    $tokenNavigateur = $_COOKIE['tokenUser'];
}

/******
GET LIKE
 ******/
$sql = 'SELECT idLabs FROM likes WHERE tokenNavigateur = :tokenNavigateur';
$stmt = $db->prepare($sql);
$stmt->execute(['tokenNavigateur' => $tokenNavigateur]);
$likedLabs = $stmt->fetchAll(PDO::FETCH_COLUMN);


/******
  LIKE
 ******/

if (!empty($_GET['like']) && !empty($tokenNavigateur)) {
    $idLabs = $_GET['like'];
    //var_dump($idLabs);
    $sql = 'INSERT INTO `likes`(`idLabs`, `tokenNavigateur`) VALUES (:idLabs, :tokenNavigateur)';
    $stmt = $db->prepare($sql);
    $stmt->execute(['idLabs' => $idLabs, 'tokenNavigateur' => $tokenNavigateur]);
    header('Location: .#labs' . $idLabs);
}

/******
  DISLIKE
 ******/

// Si idLabs est présent dans la table likes ET que le token correspondant est le même que celui de "l'utilisateur" PB dans le code le coeur ne change pas sans refresh de la page pour le dislike
//J'ai rajouté le header Location pour que la page se recharge bonne ou mauvaise idée ? BONNE IDEE ! like fort
if (!empty($_GET['dislike']) && !empty($tokenNavigateur)) {
    $idLabs = $_GET['dislike'];
    $sql = 'DELETE FROM `likes` WHERE idLabs = :idLabs AND tokenNavigateur = :tokenNavigateur';
    $stmt = $db->prepare($sql);
    $stmt->execute(['idLabs' => $idLabs, 'tokenNavigateur' => $tokenNavigateur]);
    header('Location: .#labs' . $idLabs);
}

?>

<header> <?php $cp_navbar(); ?> </header>

<?php $cp_hero(); ?>

<main>

    <div class="intro">
        <div class="intro-title">
            <p>Nos Labs <i class="ri-arrow-right-s-line"></i></p>
        </div>
    </div>

    <div class="card-flex">

        <?php foreach ($allLabs as $lab) { ?>
            <div id="labs<?= $lab['id'] ?>" class="card" style="width: 18rem;">
                <a href="labs.php?id=<?= $lab['id']; ?>">
                    <img src="file_assets/<?= $lab['background'] ?>" class="card-img-top" alt="card">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $lab['name'] ?>
                        <?php if (!in_array($lab['id'], $likedLabs)) { ?>
                            <i onclick="window.location.href='?like=<?= $lab['id']; ?>';" class="ri-heart-2-line"></i>
                        <?php } else { ?>
                            <i onclick="window.location.href='?dislike=<?= $lab['id']; ?>';" class="ri-heart-2-fill" style="color: #0036DE;"></i>
                        <?php } ?>
                    </h5>
                </div>
            </div>
        <?php } ?>

    </div>
</main>

<style>
    main {
        border-top: solid 2px #0036DE;
        border-bottom: solid 2px #0036DE;
    }

    main .intro {
        height: 45px;
        width: 100%;
        border-bottom: solid 2px #0036DE;
    }

    main .intro-title {
        width: 50%;
        border-right: solid 2px #0036DE;
        height: 100%;
    }

    main .intro-title p {
        padding-top: 5px;
        display: flex;
        margin: 0 0 0 25%;
        font-size: 22px;
    }

    main .intro-title i {
        margin-left: 10px;
        font-size: 22px;
    }

    main .card {
        border: 0;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
    }

    main .card img {
        filter: blur(1px);
    }


    main .card-flex {
        display: flex;
        justify-content: space-around;
        max-width: 1080px;
        margin: 40px auto;
        flex-wrap: wrap;
        gap: 38px;
    }

    main .card-title {
        display: flex;
        justify-content: space-between;
        color: black;
    }

    main .card-title i:hover {
        color: #0036DE;
    }

    main a {
        text-decoration: none;
        color: black;
    }
</style>

<?php $js_exemple(); ?>

<?php $cp_footer(); ?>


<?php require "@tyrositeframework/end.php"; ?>