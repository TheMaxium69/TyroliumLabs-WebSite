<?php $page_id = 2; require "@tyrositeframework/start.php"; ?>

<?php

/*
 *
 * GET LABS SELECTED
 *
 * */
$idSelected = $_GET['l'];
$labsSelected = "";

if(empty($idSelected)){

    $cp_404();
    exit();

} else {

    $labsSelected = getOneLabs($idSelected);
}

/*
 *
 * IS LIKE ?
 *
 * */

if(!empty($_GET['i'])){

    $MyToken = "";

    if(empty($_COOKIE['token_nav'])){

        $newToken = md5(uniqid() . uniqid());
        setcookie("token_nav", $newToken);
        $MyToken = $newToken;

    } else {

        $MyToken = $_COOKIE['token_nav'];

    }


    if (isAlreadyLiked($idSelected, $MyToken)) {

        echo '<script>window.location.href = "show.php?l='. $idSelected .'"</script>';

    } else {

        $isLiked = addLike($idSelected,$MyToken);

    }

    echo '<script>window.location.href = "show.php?l='. $idSelected .'"</script>';

}


/*
 *
 * DISABLE LIKE !!!!!
 *
 * */

if(!empty($_GET['d'])) {

    $MyToken = "";

    if(empty($_COOKIE['token_nav'])){

        $newToken = md5(uniqid() . uniqid());
        setcookie("token_nav", $newToken);
        $MyToken = $newToken;

    } else {

        $MyToken = $_COOKIE['token_nav'];

    }

    if (isAlreadyLiked($idSelected, $MyToken)) {

        $isLiked = disableLike($idSelected,$MyToken);

    } else {

        echo '<script>window.location.href = "show.php?l='. $idSelected .'"</script>';

    }


    echo '<script>window.location.href = "show.php?l='. $idSelected .'"</script>';
}


?>

<header> <?php $cp_navbar(); ?> </header>

<main>

    <?php $cp_heroshow() ?>

    <div class="container mt-4">
        <div class="row shows" style="align-content: center;justify-content: center;">
            <div class="col" style="max-width: 525px;">
                <?php $cp_moreshow() ?>
            </div>
            <div class="col useshow">
                <?php $cp_useshow() ?>
            </div>
        </div>
    </div>


    <?php
    
        $allLabs = getAllLabs();
        $tempCurrentIndex = 0;

        for($i=0; $i < sizeof($allLabs); $i++){
            $oneLabs = $allLabs[$i];
            if($allLabs[$i]['id'] == $labsSelected['id']){
                $tempCurrentIndex = $i;
            }
        }

        $prevLabsIndex = $tempCurrentIndex-1;
        $nextLabsIndex = $tempCurrentIndex+1;
    
    ?>

    <div id="paginationcadre">
        <div class="container" id="pagination">
            <div class="col-lg-6 desktop">
                <?php if(!empty($allLabs[$prevLabsIndex])){ ?>
                    <h1 id="prev" onclick="window.location.href = 'show.php?l=<?= $allLabs[$prevLabsIndex]['id'] ?>';">
                    <i class="ri-arrow-left-circle-line"></i>
                        Page précédante
                    </h1>
                <?php } ?>
            </div>
            <div class="col-lg-6 desktop">
                <?php if(!empty($allLabs[$nextLabsIndex])){ ?>
                    <h1 id="next" onclick="window.location.href = 'show.php?l=<?= $allLabs[$nextLabsIndex]['id'] ?>';">
                        Page suivante
                        <i class="ri-arrow-right-circle-line"></i>
                    </h1>
                <?php } ?>
            </div>
            <div class="col-lg-6 mobile">
                <?php if(!empty($allLabs[$prevLabsIndex])){ ?>
                    <h1 id="prev" onclick="window.location.href = 'show.php?l=<?= $allLabs[$prevLabsIndex]['id'] ?>';">
                        <i class="mobileIStart ri-arrow-left-circle-line"></i>
                    </h1>
                <?php } ?>
            </div>
            <div class="col-lg-6 mobile">
                <?php if(!empty($allLabs[$nextLabsIndex])){ ?>
                    <h1 id="next" onclick="window.location.href = 'show.php?l=<?= $allLabs[$nextLabsIndex]['id'] ?>';">
                        <i class="mobileIEnd ri-arrow-right-circle-line"></i>
                    </h1>
                <?php } ?>
            </div>
        </div>
    </div>

</main>


<?php $cp_footer() ?>

<?php $js_exemple(); ?>

<style>
    #paginationcadre {
        border-top: 2px solid #0036DE;
        margin-top: 50px;
    }
    
    #pagination{
        display: flex;
        justify-content: center;
        text-align: center;
    }


    #pagination h1{
        font-family: "Share Tech Mono", monospace;
        font-size: 24px;
        font-weight: 400;
        margin: auto;
        padding: 15px 0;

    }

    #pagination #prev {
        border-right: 1px solid #0036DE!important;
    }

    #pagination #next {
        border-left: 1px solid #0036DE!important;
    }

    #pagination .mobile {
        display: none;
        width: 100%;
        cursor: pointer;
    }

    #pagination .desktop {
        cursor: pointer;
    }
    
    @media (max-width: 991px) {

        #pagination .desktop {
            display: none;
        }

        #pagination .mobile {
            display: block;
        }

        #pagination i {
            display: flex;
            /* justify-content: end; */
            text-align: center;
            font-size: 40px;
        }

        #pagination .mobileIStart {
            justify-content: start;
            margin-left: 10px;
        }

        #pagination .mobileIEnd {
            justify-content: end;
            margin-right: 10px; 
        }
        
        .shows {
            flex-direction: column;
        }
    }

</style>

<?php require "@tyrositeframework/end.php"; ?>