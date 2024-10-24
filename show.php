<?php $page_id = 2; require "@tyrositeframework/start.php"; ?>

<?php

$idSelected = $_GET['l'];
$labsSelected = "";

if(empty($idSelected)){

    $cp_404();
    exit();

} else {

    $labsSelected = getOneLabs($idSelected);

}

?>

<header> <?php $cp_navbar(); ?> </header>

<main>

    <?php $cp_heroshow() ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 ">
                <?php $cp_moreshow() ?>
            </div>
            <div class="offset-lg-2 col-lg-6">
                <?php $cp_useshow() ?>
            </div>
        </div>
    </div>


    
    <div id="paginationcadre">
        <div class="container" id="pagination">
            <div class="col-lg-6 desktop">
                <h1 id="prev">
                <i class="ri-arrow-left-circle-line"></i>
                    Page précédante
                </h1>
            </div>
            <div class="col-lg-6 desktop">
                <h1>
                    Page suivante
                    <i class="ri-arrow-right-circle-line"></i>
                </h1>
            </div>
            <div class="col-lg-6 mobile">
                <h1 id="prev">
                <i class="mobileIStart ri-arrow-left-circle-line"></i>
                </h1>
            </div>
            <div class="col-lg-6 mobile">
                <h1>
                    <i class="mobileIEnd ri-arrow-right-circle-line"></i>
                </h1>
            </div>
        </div>
    </div>

</main>


<?php $cp_footer() ?>

<?php $js_exemple(); ?>



<?php require "@tyrositeframework/end.php"; ?>

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
        border-right: 2px solid #0036DE;
    }

    #pagination .mobile {
        display: none;
        width: 100%;
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
    }
</style>