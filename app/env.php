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
$SALT = "app/salt." . $APP_ENV . ".php";


/*************************
 *
 *     INIT VARIABLE
 *
 ************************/

//Variable GLOBAL
$env_name = "Labs.Tyrolium";
$env_logo = $SYSTEM_ASSETS . "logo.png";
$env_url = "https://labs.tyrolium.fr"; /* for <meta> */
$env_desc = "Labs.Tyrolium"; /* for <meta> */
$env_lang = "fr"; /* for <html lang=""> */

// PAGE MANAGEMENT
$env_page = array(
    //404
    0 => array(
        "title" => "404 | " . $env_name,
        "url" => "./404.php",
        "css" => "404.css",
    ),
    //Page
    1 => array(
        "title" => $env_name,
        "name" => "Accueil",
        "url" => "./",
        "css" => "index.css",
    ),
    2 => array(
        "title" =>  $env_name,
        "name" => "Show",
        "url" => "./show.php",
        "css" => "show.css",
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

$repoUrlGlobal = "https://github.com/";