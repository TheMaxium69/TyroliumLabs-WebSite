<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<?php $cp_hero(); ?>

<main>

    <div class="intro">
        <div class="intro-title">
            <p>Nos Labs <i class="ri-arrow-right-s-line"></i></p>
        </div>
    </div>



</main>

<style>

    main{
        border-top: solid 2px #0036DE;
        border-bottom: solid 2px #0036DE;
    }

    .intro{
        height:45px;
        width: 100%;
        border-bottom: solid 2px #0036DE;
    }

    .intro-title{
        width: 50%;
        border-right: solid 2px #0036DE;
        height: 100%;
    }

    .intro-title p{
        padding-top: 5px;
        display: flex;
        margin: 0 0 0 25%;
        font-size: 22px;
    }

    .intro-title i {
        margin-left: 10px;
        font-size: 22px;
    }



</style>


<?php $js_exemple(); ?>

<?php $cp_footer(); ?>


<?php require "@tyrositeframework/end.php"; ?>