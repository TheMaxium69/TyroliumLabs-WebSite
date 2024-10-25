<?php

function getGithub(string $repo) {

    require "app/env.php";


    /*
     *
     * Global Repo
     *
     * */

    $ch = curl_init();
    $url = $apiGithubUrl . $repo;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Accept: application/vnd.github+json',
       'X-GitHub-Api-Version: 2022-11-28',
       'User-Agent: Awesome-Octocat-App'
    ));

    $responseJson = curl_exec($ch);
    $responseGlobalRepo = json_decode($responseJson, true);
    curl_close($ch);

    /*
     *
     * Contributeur
     *
     * */

    $ch2 = curl_init();
    $url2 = $apiGithubUrl . $repo . "/contributors";

    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/vnd.github+json',
        'X-GitHub-Api-Version: 2022-11-28',
        'User-Agent: Awesome-Octocat-App'
    ));

    $responseJson2 = curl_exec($ch2);
    $responseContributeurRepo = json_decode($responseJson2, true);
    curl_close($ch2);


    /*
     *
     * RE FORMATAGE DE DONNER
     *
     * */

    $AllContributeur = [];
    $totalCommit = 0;

    foreach ($responseContributeurRepo as $oneContributeur) {

        $totalCommit = $totalCommit + $oneContributeur['contributions'];

        $AllContributeur[] = [
            "name" => $oneContributeur['login'],
            "url" => $oneContributeur['html_url'],
        ];

    }

    $repoReponse = [
      "contributors"=>$AllContributeur,
      "branch"=>$responseGlobalRepo["default_branch"],
      "commit"=>$totalCommit,
    ];

    return $repoReponse;

}
