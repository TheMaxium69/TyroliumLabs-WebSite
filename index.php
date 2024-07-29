<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<?php $cp_hero(); ?>

<main>

    <div class="intro">
        <div class="intro-title">
            <p>Nos Labs <i class="ri-arrow-right-s-line"></i></p>
        </div>
    </div>

    <div class="card-flex">

        <div class="card" style="width: 18rem;">
            <img src="file_assets/card.png" class="card-img-top" alt="card">
            <div class="card-body">
                <h5 class="card-title">Card title <i class="ri-heart-2-line"></i></h5>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="file_assets/card.png" class="card-img-top" alt="card">
            <div class="card-body">
                <h5 class="card-title">Card title <i class="ri-heart-2-line"></i></h5>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="file_assets/card.png" class="card-img-top" alt="card">
            <div class="card-body">
                <h5 class="card-title">Card title <i class="ri-heart-2-line"></i></h5>
            </div>
        </div>

    </div>



</main>

<style>

    main{
        border-top: solid 2px #0036DE;
        border-bottom: solid 2px #0036DE;
    }

    main .intro{
        height:45px;
        width: 100%;
        border-bottom: solid 2px #0036DE;
    }

    main .intro-title{
        width: 50%;
        border-right: solid 2px #0036DE;
        height: 100%;
    }

    main .intro-title p{
        padding-top: 5px;
        display: flex;
        margin: 0 0 0 25%;
        font-size: 22px;
    }

    main .intro-title i {
        margin-left: 10px;
        font-size: 22px;
    }

    main .card{
        border: 0;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
    }

    main .card-flex{
        display: flex;
        justify-content: space-around;
        max-width: 1080px;
        margin: 40px auto;
    }

    main .card-title{
        display: flex;
        justify-content: space-between;
        color: black;
    }


</style>


<?php $js_exemple(); ?>

<?php $cp_footer(); ?>


<?php require "@tyrositeframework/end.php"; ?>