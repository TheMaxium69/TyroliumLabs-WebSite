<?php

/*************************
 *
 *     SYSTEME VARIABLE
 *
 ************************/

//prod OR dev
$APP_ENV = "dev";

// Link Variable
$SYSTEM_FRAMEWORK = "@tyrositeframework/";
$SYSTEM_COMPOSANT = "composant/";
$SYSTEM_EXTENSION = "file_extension/";
$SYSTEM_ASSETS = "file_assets/";
$SYSTEM_JAVASCRIPT = "file_javascript/";
$SYSTEM_CSS = "file_css/";

// Data
$DATABASE = "app/database." . $APP_ENV . ".php";


/*************************
 *
 *     INIT VARIABLE
 *
 ************************/

//Variable GLOBAL
$env_name = "TyroliumLabs";
$env_logo = $SYSTEM_ASSETS . "logo.png";
$env_url = "https://labs.tyrolium.fr"; /* for <meta> */
$env_desc = "Tyrolium Labs est un site qui présente les projets technologie informatique de Tyrolium"; /* for <meta> */
$env_lang = "fr"; /* for <html lang=""> */

// PAGE MANAGEMENT
$env_page = array(
    //404
    0 => "404 | " . $env_name,
    //Page
    1 => array(
        "title" => "Accueil | " . $env_name,
        "name" => "Accueil",
        "url" => "./",
        "css" => "index.css",
    ),
    2 => array(
        "title" => "Labs | " . $env_name,
        "name" => "Labs",
        "url" => "./labs.php",
        "css" => "labs.css",
    ),
    /*...*/
);

// FILE CSS GLOBAL
$env_css_global = array(
    "all.css",
);

// FILE JS GLOBAL
$env_js_global = array(
    "start.js"
);

/*************************
 *
 *     YOUR VARIABLE
 *
 ************************/

$env_titre = "HelloWorld";