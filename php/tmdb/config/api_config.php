<?php


// Environnement pour contourner le blocage proxy du GRETA ('dev' pour le greta ou 'prod' pour environnement ouvert)
define('ENV', 'dev');


$PROXY_CONFIG = [
    'dev' => [
        'enabled' => true,
        'host' => '172.16.0.253',
        'port' => 3128
    ],
    'prod' => [
        'enabled' => false,
        'host' => '',
        'port' => ''
    ]
];


function getCurlOptions($url)
{
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_VERBOSE => true,
        CURLOPT_CAINFO => __DIR__ . '/cacert.pem'
    ];


    global $PROXY_CONFIG;
    if ($PROXY_CONFIG[ENV]['enabled']) {
        $options[CURLOPT_PROXY] = $PROXY_CONFIG[ENV]['host'];
        $options[CURLOPT_PROXYPORT] = $PROXY_CONFIG[ENV]['port'];
    }

    return $options;
}

function getCurlOptionsV2($type,$cast,$id){
    if ($type == "movie" && $cast == "video") {
        $options = [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id/videos?language=fr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTM1MTJlN2JkMWZiODYyNzg1OTk5NDA5MzIwZGQxYSIsIm5iZiI6MTc0ODg0OTkwMy45MzcsInN1YiI6IjY4M2Q1NGVmZjMzNzVhMjQyZTUzODM5MSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AqmxrhhO78EM5KAee66Dxieypej_t6aai38R_uX7ibw",
                "accept: application/json"
            ],
        ];

    }

    elseif ($type == "movie" && $cast == "cast") {
        $options = [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id/credits?language=fr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTM1MTJlN2JkMWZiODYyNzg1OTk5NDA5MzIwZGQxYSIsIm5iZiI6MTc0ODg0OTkwMy45MzcsInN1YiI6IjY4M2Q1NGVmZjMzNzVhMjQyZTUzODM5MSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AqmxrhhO78EM5KAee66Dxieypej_t6aai38R_uX7ibw",
                "accept: application/json"
            ],
        ];


    }

    elseif ($type == "shows" && $cast == "video") {
        $options = [
            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$id/videos?language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTM1MTJlN2JkMWZiODYyNzg1OTk5NDA5MzIwZGQxYSIsIm5iZiI6MTc0ODg0OTkwMy45MzcsInN1YiI6IjY4M2Q1NGVmZjMzNzVhMjQyZTUzODM5MSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AqmxrhhO78EM5KAee66Dxieypej_t6aai38R_uX7ibw",
                "accept: application/json"
            ],
        ];


    }

    elseif ($type == "shows" && $cast == "cast") {

        $options = [
            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$id/credits?language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTM1MTJlN2JkMWZiODYyNzg1OTk5NDA5MzIwZGQxYSIsIm5iZiI6MTc0ODg0OTkwMy45MzcsInN1YiI6IjY4M2Q1NGVmZjMzNzVhMjQyZTUzODM5MSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AqmxrhhO78EM5KAee66Dxieypej_t6aai38R_uX7ibw",
                "accept: application/json"
            ],
        ];

    }

    global $PROXY_CONFIG;
    if ($PROXY_CONFIG[ENV]['enabled']) {
        $options[CURLOPT_PROXY] = $PROXY_CONFIG[ENV]['host'];
        $options[CURLOPT_PROXYPORT] = $PROXY_CONFIG[ENV]['port'];
    }
    return $options;

}
