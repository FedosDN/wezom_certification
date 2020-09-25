<?php

namespace App\Repositories;

use App\Models\Make;

class MakesRepository extends AbstractRepository
{
    public function save()
    {
    }

    public function saveMany(bool $shouldChunk = true)
    {
        if ($shouldChunk) {
            foreach (array_chunk($this->data, $this->chunkSize) as $chunks) {
                foreach ($chunks as $chunk) {
                    Make::query()->insertOrIgnore($chunk);
                }
            }
        } else {
            Make::query()->insertOrIgnore($this->data);
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

    /**
     * @param $name
     * @return Make|null
     */
    public function getByName($name)
    {
        return Make::query()->where('name', $name)->first();
    }
}
