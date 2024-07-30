<?php $page_id = 2; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>




<section id="labs">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12 mb-4 mb-lg-0 image">
                        <div class="mt-4 titre">
                            <img src="./file_assets/card.png" alt="*">   
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="mt-4 titre imageindex">
                           
                            <div class="card" style="width: 18rem;">
                                <img src="./file_assets/logo.png" class="card-img-top" alt="...">
  
                                 </div>
                                 
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="mt-4 titre border">
                            <h2>TyroSiteFrameWork</h2>   
                        </div>
                    </div>
                    <div class="col-lg-2 mb-4 mb-lg-0 mt-4">
                    <div class="mt-4 titre border">
                        <p>like</p>
                    </div>    
                    </div>
                </div>
            </div>
        </section>

</main>

<style>
   #labs{ 
   .image img{
            width: 100%;
            height: auto;
        }

        
    .image {
            background-size: cover;
            background-repeat: no-repeat;
            }


        }

        .imageindex img {
        position: relative;
        top: -300px;
        height: 400px;

    }  
</style>

</main>





<?php $js_exemple(); ?>






<?php require "@tyrositeframework/end.php"; ?>