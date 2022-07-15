<?php

class KeywordIterator extends AbstractIterator
{
    private $keyword;

    public function __construct(array $results, string $keyword)
    {
        $this->keyword = $keyword;
        $this->populate($results);
    }

    protected function populate(array $results)
    {
        foreach ($results as $key => $result) {
            $this->results[$key]['url'] = $result->link??'no link available';
            $this->results[$key]['title'] = $result->title??'no title available';
            $this->results[$key]['description'] = $result->snippet??'no description available';
            $this->results[$key]['keyword'] = $this->keyword??'no keyword available';
            $this->results[$key]['ranking'] = $key+1;
            $this->results[$key]['promoted'] = strpos( $this->results[$key]['url'], 'utm_source')?"ad":"organic result"; 
        }
    }
}