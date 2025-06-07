<?php


// Environnement pour contourner le blocage proxy du GRETA ('dev' pour le greta ou 'prod' pour environnement ouvert)
define('ENV', 'prod');


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
