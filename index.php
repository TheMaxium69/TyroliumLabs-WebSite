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
  LIKE
 ******/

$token = 'slmhcjkgKLJGHJHBJNGH';
$tokenNavigateur = $token;

// RECUPERE OU CREER UN TOKEN EN COOKIE

if (!empty($_GET['like']) && !empty($token) && $tokenNavigateur === $token) {
    $idLabs = $_GET['like'];
    //var_dump($idLabs);
    $sql = 'INSERT INTO `likes`(`idLabs`, `tokenNavigateur`) VALUES (:idLabs, :tokenNavigateur)';
    $stmt = $db->prepare($sql);
    $stmt->execute(['idLabs' => $idLabs, 'tokenNavigateur' => $token]);
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
        <?php foreach ($allLabs as $lab) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="file_assets/<?= $lab['background'] ?>" class="card-img-top" alt="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $lab['name'] ?> <?php if (empty($idLabs)) { ?>
                            <i onclick="window.location.href='?like=<?= $lab['id']; ?>';" class="ri-heart-2-line"></i>
                        <?php } else { ?>
                            <i class="ri-heart-2-fill"></i>
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

    main .card-flex {
        display: flex;
        justify-content: space-around;
        max-width: 1080px;
        margin: 40px auto;
    }

    main .card-title {
        display: flex;
        justify-content: space-between;
        color: black;
    }

    main .card-title i:hover {
        color: #0036DE;
    }
</style>

<?php $js_exemple(); ?>

<?php $cp_footer(); ?>


<?php require "@tyrositeframework/end.php"; ?>