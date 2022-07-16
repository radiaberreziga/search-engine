# PHP Search Engine Extract  SEE

## Installation

You can install the package via composer:

``` bash
composer require radia/search-engine
```
or you can add the package to your composer.json then `composer install`
```php
  "require": {
        //...
        "radia/search-engine": "dev-master"
    }
```
## Usage
```php
<?php
$client = new src\SearchEngine();
$client->setEngine('google.com');
$results =  $client->search(['keyword1','keyword2']);

foreach ($results as $result){
    echo "title is : ".$result['title']."</br>".
        "ranking is : ".$result['ranking']."</br>".
        "promoted is : ".$result['promoted']."</br>".
        "url is : ".$result['url']."</br>".
        "description : ".$result['description']."</br>".
        "keyword is : ".$result['keyword']."</br>*******************</br>";
}
```
## search Engines
supported search engine is `google.com` or `google.ae`
