<?php $page_id = 2;
require "@tyrositeframework/start.php"; ?>

<?php

require $DATABASE;

if (isset($_GET['id'])) {
    $idLabsRequest = $_GET['id'];

    $sql = "SELECT * FROM labs WHERE id =:id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $idLabsRequest]);
    $tabsSelected = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($tabsSelected)) {

        $sqlProjects = "SELECT * FROM projectlab WHERE idlabs =:id";
        $stmtProjects = $db->prepare($sqlProjects);
        $stmtProjects->execute(['id' => $idLabsRequest]);
        $projects = $stmtProjects->fetchAll(PDO::FETCH_ASSOC);

        $sql = 'SELECT COUNT(*) FROM likes WHERE idLabs = :id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $idLabsRequest]);
        $totalLikes = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // var_dump("ma parole la bdd , elle est grâve vide");
        header('Location: .');
    }
} else {

    // var_dump("je sait qu'il n'y a rien");
    header('Location: .');
}

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
}

/******
  DISLIKE
 ******/
if (!empty($_GET['dislike']) && !empty($tokenNavigateur)) {
    $idLabs = $_GET['dislike'];
    $sql = 'DELETE FROM `likes` WHERE idLabs = :idLabs AND tokenNavigateur = :tokenNavigateur';
    $stmt = $db->prepare($sql);
    $stmt->execute(['idLabs' => $idLabs, 'tokenNavigateur' => $tokenNavigateur]);
}

?>
<header>
    <?php $cp_navbar(); ?>
</header>

<main>
    <section id="labs">
        <div class="background mb-3 blur-background" style="background-image: url(file_assets/<?= $tabsSelected['background'] ?>)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4  ">
                    <div class="logo rounded bg bg-white p-3 ">
                        <div class="logo-bg " style="background-image: url(file_assets/<?= $tabsSelected['icone'] ?>)"></div>
                    </div>
                </div>

                <div class="col-lg-6 ">
                    <div class=" titre">
                        <h1><?= $tabsSelected['name'] ?></h1>
                    </div>
                </div>

                <div class="col-lg-2 ">
                    <div class=" ms-5 mt-4 ">
                        <h5>
                            <?php if (!in_array($tabsSelected['id'], $likedLabs)) { ?>
                                <i onclick="window.location.href='?like=<?= $tabsSelected['id']; ?>';" class="ri-heart-2-line fs-1"></i>
                            <?php } else { ?>
                                <i onclick="window.location.href='?dislike=<?= $tabsSelected['id']; ?>';" class="ri-heart-2-fill fs-1" style="color: #0036DE;"></i>
                            <?php } ?>
                        </h5>
                    </div>
                </div>

                <div class="col-12">
                    <div class=" text-center">
                        <p><?= $tabsSelected['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="labs2" class="margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-ms-4 col-12 ms-5 ">

                    <div class="content-version   w-75 p-4 mb-4 rounded ">
                        <p>Version : <?= $tabsSelected['version'] ?></p>
                        <p>Contributeur : <?= $tabsSelected['contributor'] ?></p>
                        <p>Commit : <?= $tabsSelected['commit'] ?></p>
                        <p>Like : <?= $totalLikes['COUNT(*)'] ?></p>
                        <p class="text"> Repos : <?= $tabsSelected['repoUrl'] ?></p>
                    </div>
                </div>

                <div class="col-lg-6 col-ms-6 col-12 ms-5  ">
                    <div class=" border-titre p-4 ">
                        <h2>
                            <u>Projet qui utilise ce Labs:</u>
                        </h2>

                        <div class="project  p-3">
                            <?php foreach ($projects as $project) { ?>
                                <div class="row">
                                    <div class="col-8">
                                        <p class="border-bottom"><?= $project['name'] ?></p>
                                    </div>
                                    <div class="col-2"><a href="<?= $project['urlWebSite'] ?>"><i class="ri-global-line"></i></a> </div>
                                    <div class="col-2"><a href="<?= $project['urlRepo'] ?>"><i class="ri-github-fill"></i></a> </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-container" style="display: flex; width: 100%">
                <div style="width: 50%">
                    <div class="border-page d-flex justify-content-start align-items-center py-2">
                        <a href="">
                            <h5> <span><i class="ri-arrow-left-circle-line mx-2"></i></span>Labs Précedente</h5>
                        </a>

                    </div>
                </div>
                <div style="width: 50%">
                    <div class="border-page d-flex justify-content-end align-items-center py-2">

                        <a href="">
                            <h5>Labs Suivante<span><i class="ri-arrow-right-circle-line mx-2"></i></span></h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        #labs {
            .logo {
                position: relative;
                top: -80px;
                height: 160px;
                width: 180px;

            }

            .logo-bg {
                position: relative;
                top: -10px;
                height: 150px;
                width: 150px;
                background-size: contain;
                background-position: center;
                background-repeat: no-repeat;

            }

            .titre {
                border-bottom: solid 4px #0036DE;
                text-align: center;
            }

            .background {
                width: 100%;
                height: 400px;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }


            .blur-background {
                filter: blur(2px);
                /* Vous pouvez ajuster la valeur pour plus ou moins de flou */
            }

        }


        #labs2 {

            margin-top: 100px;

            .content-version {
                background-color: #E9ECEF;
            }

            .border-titre {
                border-top: solid 5px #0036DE;
            }

            .titre2 {
                width: 50%;
                margin-bottom: 20px;
                font-size: 20px;
            }

            .borderbottom {
                border-bottom: solid px black;
                margin-bottom: 20px;
                width: 20%;
            }

            .border-page {
                border: solid 5px #0036DE;
            }


            a {
                text-decoration: none;
                color: black;
            }
        }
    </style>
</main>

<?php $cp_footer(); ?>
<?php require "@tyrositeframework/end.php"; ?>