<?php

require 'HttpRequest/HttpRequest.php';

require 'Interator/AbstractIterator.php';
require 'Interator/KeywordIterator.php';
require 'Interator/SearchIterator.php';


Class SearchEngine{
   
    private $engine = "";
    private $result = [];

    public function search(array $keywords): ArrayIterator
    {
        try {
            foreach ($keywords as $keyword) {
                array_push($this->result, ...$this->searchKeyword($keyword));
            }
            return new SearchIterator($this->result);

        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }

     private function searchKeyword(string $keyword):ArrayIterator
    {
        $keywordArray = [];
        for ($i=0; $i < 5; $i++){

            $Client = new HttpRequest();
            $result = $Client->buildCallApi($keyword,$this->engine,$i*10+1);

           if(isset($result->items)) // check if there is a result for this call
               array_push($keywordArray,...$result->items);

           if (!isset($result->queries->nextPage)) // if there is no next page then stop calling server
               break;
        }
        return new KeywordIterator($keywordArray,$keyword);
    }

	Public function setEngine(string $engine)
    {
        switch ($engine){
            case "google.ae": $this->engine = "&g1=ae";break;
            case "google.com": $this->engine = "";break;
            default : throw new Exception('Sorry: no search engine known');
        }
    }
}