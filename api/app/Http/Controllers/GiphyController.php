<?php

namespace App\Http\Controllers;

use App\Services\GiphyService;

class GiphyController extends Controller
{
    private $giphy_service;
    public function __construct(GiphyService $giphy_service)
    {
        $this->giphy_service = $giphy_service;
    }
    
    public function getGifs(string $name)
    {
        return response()->json($this->client->getGifs($name));
    }

    public function getStickers(string $name)
    {
        return response()->json($this->client->getStickers($name));
    }

    public function getTrendingGifs()
    {
        return response()->json($this->client->getTrendingGifs());
    }

    public function getTrendingStickers()
    {
        return response()->json($this->client->getTrendingStickers());
    }
}