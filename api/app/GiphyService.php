<?php

namespace App\Services;

use Giphy\Giphy;

class GiphyService {

    private $client;

    public function __construct(Giphy $giphy)
    {
        $this->client = $giphy;
    }

    public function getGifs(string $name)
    {
        return $this->client->gifsSearch($name);
    }

    public function getStickers(string $name)
    {
        return $this->client->stickersSearch($name);
    }

    public function getTrendingGifs()
    {
        return $this->client->gifsTrending();
    }

    public function getTrendingStickers()
    {
        return $this->client->stickersTrending();
    }

}