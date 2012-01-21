<?php


$postdata = http_build_query(
    array(
        'link_id_url_map' => array('http://vidor.lin/?p=161')
    )
);

echo $postdata;

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);



$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://uyan.cc/index.php/youyan_comment_amount?callback=?', false, $context);

echo $file;