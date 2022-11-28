<?php
include_once './db.php';
include_once './simple_html_dom.php';

// print_r($_SERVER);

function curlGetPage($url, $referer = 'https://dzen.ru/')
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

foreach ($sql as $row) {
    $arrA[] = $row['link'];
}


$page = curlGetPage("https://www.sport-express.ru/football/reviews/");
$html = str_get_html($page);


foreach ($html->find('.se-press-list-page__item') as $item) {
    $title = $item->find('.se-material__title', 0);
    $img = $item->find('img', 0);
    echo $title;
    echo $img->src;
}


    // } else {
    //     echo 'No';
    // }
// }
