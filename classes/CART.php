<?php
class Cart
{
    public $total;
    public $articles;
    function __construct($articles)
    {
        $this->articles = $articles;
    }
    public function calculateTotalPrice()
    {
        foreach ($this->articles as $article) {
            $this->total += $article->price;
        }
        return $this->total;
    }
}
