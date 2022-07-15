<?php


class SearchIterator extends AbstractIterator
{
    protected function populate(array $results)
    {
        $this->results = $results;
    }
}