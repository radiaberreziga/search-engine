<?php


require './../vendor/autoload.php';
Class HttpRequest{

   public function buildCallApi($keyword, $engine, $start = 1)
    {
        $baseUrl = "https://www.googleapis.com/customsearch/v1";
       //$key = 'AIzaSyBaPxycT3gj82T5qm66XGgIvtSEP31LISo';
         $key = "AIzaSyBa_4PnN8PvBata0hfFLhGbBV8DU4PwHQg";
        if (!$key || $key === "") throw new Exception("cannot find api key in your env file");
        $cx = '015261035819156121642:qj7jmhlymjw';
      //  $cx ="b9e4370a588a72e6a";
        if (!$cx || $cx === "") throw new Exception("cannot find CX key in your env file");
        $uri = $baseUrl . "?fields=queries,items(title,link,snippet)&key=" . $key . "&cx=" . $cx . "&q=" . $keyword . $engine . "&start=" . $start;
        return $this->callHttp($uri);
    }

    function callHttp($endPoint)
    {
        //echo $endPoint;
        try {
            $client = new \GuzzleHttp\Client();
            $result = $client->request('GET', $endPoint, 
            ['verify' => false,
        ]);
            return json_decode($result->getBody()->getContents());
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = json_decode($response->getBody()->getContents());
            throw new Exception($responseBodyAsString->error->message);
        }
    }
}
?>
