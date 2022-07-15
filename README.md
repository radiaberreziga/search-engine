# PHP search engine crawler 

## Installation

You can install the package via composer:

``` bash
composer require radia/search-engine
```
or you can add the package to your composer.json then `composer install`
```php
  "require": {
        //...
        "radia/search-engine": "dev-main"
    }
```
## Usage
```php
<?php
$client = new src\SearchEngine();
$client->setEngine('google.com');
$results =  $client->search(['flower','horizon']);
```
## search Engines
supported search engine is `google.com` or `google.ae`
