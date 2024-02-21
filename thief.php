<?php
$url="https://linux24.ru/news";
$arrContextOptions=array(
"ssl" => array(
"verify_peer" => false,
"verify_peer_name" => false,
),
);
$content=file_get_contents($url, false, stream_context_create($arrContextOptions));
echo $content;

$opts = array(
    'http' => array(
    'method' => "OPTIONS"
    )
    );
    $context = stream_context_create($opts);
    $url =
    "http://php.net/manual/ru";

print_r(get_headers($url));
var_dump($http_response_header);
?>