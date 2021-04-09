<?php


namespace App\Repositories;


interface BaseRepository
{
    public function getAll();

    public function filter(array $filter, array $relationships);
}
