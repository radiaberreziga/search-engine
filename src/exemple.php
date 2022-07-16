<?php



require 'SearchEngine.php';

$client = new SearchEngine();
$client->setEngine('google.com');
$results =  $client->search(['php']);

foreach ($results as $result){
    echo "title is : ".$result['title']."</br>".
        "ranking is : ".$result['ranking']."</br>".
        "promoted is : ".$result['promoted']."</br>".
        "url is : ".$result['url']."</br>".
        "description : ".$result['description']."</br>".
        "keyword is : ".$result['keyword']."</br>*******************</br>";
}