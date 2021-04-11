<?php


namespace App\Repositories;


interface BaseRepository
{
    public function getAll();

    public function filter(array $filter, $offset, array $relationships = []);
}
