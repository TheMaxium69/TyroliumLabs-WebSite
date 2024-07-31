<?php $page_id = 2;
require "@tyrositeframework/start.php"; ?>


<header>
    <?php $cp_navbar(); ?>
</header>

<main>


    <section id="labs">
        <div>
            <div class="row align-items-center">
                <div class="col-lg-12 mb-4 mb-lg-0 image">
                    <div class="titre background" style="background-image: url(file_assets/card.png)"></div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0 imageindex">
                    <div class="mt-4">
                        <div>
                            <img src="./file_assets/logo.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mt-4">
                        <h1 class="titre">TyroSiteFrameWork</h1>
                    </div>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 mt-4">
                    <div class="mt-4 border">
                        <p>like</p>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 mb-lg-0 mt-4">
                    <div class="border text-center">
                        <h2>Description</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="labs2">
        <div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 image">
                    <div class="mt-4 titre">
                        <div class="container">
                            <div class="version-info fs-5 bg-body-secondary w-50">
                                <p>Version :  2.0</p>
                                <p>Contributeur : Maxime Tournier</p>
                                <p>Commit : 435</p>
                                <p>Like : 8000</p>
                                <p>Repos :</p> <p class="text">TheMaxium69/TyroSiteFrameWork</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mt-4 border-titre">
                        <h2 class="titre2">
                            <u>Projet qui utilise ce Labs:</u>
                        </h2>
                        <div class="project fs-4">
                            <p class="border-bottom">Tyrolium Site</p>
                            <p class="border-bottom">Tyrolium Site</p>
                            <p class="border-bottom">Tyrolium Site</p>
                            <p class="border-bottom">Tyrolium Site</p>
                            <p class="border-bottom">Tyrolium Site</p>
                            <p class="border-bottom">Tyrolium Site</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-container" style="display: flex; width: 100%">
                <div style="width: 50%">
                    <div class="border-page d-flex justify-content-start align-items-center">
                        <a href=""><i class="ri-arrow-left-circle-line mx-3 mt-3 icone"></i><span>Labs Précedente</span></a>
                    
                    </div>
                </div>
                <div style="width: 50%">
                    <div class="border-page d-flex justify-content-end align-items-center">
                        <p class="margin-page"></p>
                        <a href="">Labs Suivante<span><i class="ri-arrow-right-circle-line mx-3 mt-3 icone"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<style>
    #labs {
        .image img {
            width: 100%;
            height: 500px;
        }


        .image {
            background-size: cover;
            background-repeat: no-repeat;
        }
        .imageindex img {
            position: relative;
            top: -200px;
        }
        .titre {
            border-bottom: solid 5px #0036DE;
            font-size: 30px;
            text-align: center;

        }
        .background{
            width: 100%;
            height: 500px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
       
    }

    #labs2 {
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
            /*margin-left: -1rem;*/
            /*margin-right: -1rem;*/
        }
        

        a{
            text-decoration: none;
            color:black;
        }

       

    }
</style>
</main>

<?php $cp_footer(); ?>

    <section id="labs3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-lg-0 background">

                </div>
            </div>

        </div>
    </section>

    <style>
        #labs3{

            .background{
            background: #0036DE;
            width:100%;
            height:400px;
        }

        }

    </style>
><?php require "@tyrositeframework/end.php"; ?>
