<?php

namespace App\Repositories;

use App\Models\Make;
use App\Models\Model;

class ModelsRepository extends AbstractRepository
{
    public function save()
    {
    }

    public function saveMany(bool $shouldChunk = true)
    {
        if ($shouldChunk) {
            foreach (array_chunk($this->data, $this->chunkSize) as $chunks) {
                foreach ($chunks as $chunk) {
                    Model::query()->insertOrIgnore($chunk);
                }
            }
        } else {
            Model::query()->insertOrIgnore($this->data);
        }
    }

    public function update()
    {
    }

    public function updateMany()
    {
    }

    public function delete()
    {
    }

    public function getByName($name)
    {
        return Model::query()->where('name', $name)->first();
    }
}
