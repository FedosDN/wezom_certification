<?php

namespace App\Repositories;

use Illuminate\Support\Arr;

abstract class AbstractRepository
{
    protected array $data;

    protected int $chunkSize = 10;

    public function setData(array $data = []): AbstractRepository
    {
        $this->data = $data;

        return $this;
    }

    abstract public function save();

    abstract public function saveMany();

    abstract public function update();

    abstract public function updateMany();

    abstract public function delete();
}
