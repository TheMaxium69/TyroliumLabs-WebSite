<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>

    <?php $cp_hero() ?>

    <div id="titlemain">
        <div class="container">
            <div class="col-md-6">
                <h1>
                    Nos labs <i class="ri-arrow-right-s-line"></i>
                </h1>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

    <style>
        #titlemain{
            border-bottom: 2px solid #0036DE;
            border-top: 2px solid #0036DE;

            display: flex;
            justify-content: center;
            text-align: start;
        }


        #titlemain h1{
            font-family: "Share Tech Mono", monospace;
            font-size: 24px;
            font-weight: 400;
            margin: auto;
            padding: 15px 0;
            border-right: 2px solid #0036DE;
        }

    </style>

    <?php $cp_cards() ?>

</main>


<?php $cp_footer() ?>

<?php $js_exemple(); ?>








<?php require "@tyrositeframework/end.php"; ?>