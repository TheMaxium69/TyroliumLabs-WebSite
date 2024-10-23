<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>

    <?php $cp_hero() ?>

    <div id="titlemain">
        <div>
            <h1>
                Nos labs <i class="ri-arrow-right-s-line"></i>
            </h1>
        </div>
        <div></div>

    </div>

    <style>
        #titlemain{
            border-bottom: 2px solid #0036DE;
            border-top: 2px solid #0036DE;

            display: flex;
            justify-content: center;
            text-align: start;
        }

        #titlemain div{
            /*width: 10px;*/
        }
        #titlemain div:first-child{
            border-right: 1px solid #0036DE;
        }

        #titlemain div:last-child{
            border-left: 1px solid #0036DE;
        }

        #titlemain h1{
            font-family: "Share Tech Mono", monospace;
            font-size: 24px;
            font-weight: 400;
            margin: 15px 0;
        }


    </style>

    <?php $cp_cards() ?>

</main>


<?php $cp_footer() ?>

<?php $js_exemple(); ?>








<?php require "@tyrositeframework/end.php"; ?>