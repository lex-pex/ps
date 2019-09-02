<?php


namespace App\Assist\Contracts;

interface Advert{
    public function feed(string $url);
    public function feedMenu(string $url);
}