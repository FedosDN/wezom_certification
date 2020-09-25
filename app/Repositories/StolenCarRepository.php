<?php

namespace App\Repositories;

use App\Models\StolenCar;

class StolenCarRepository extends AbstractRepository
{
    /**
     * @return int
     */
    public function save()
    {
        if ($make = resolve(MakesRepository::class)->getByName($this->data['make'])) {
            $this->data['make_id'] = $make->id;
        }
        if ($model = resolve(ModelsRepository::class)->getByName($this->data['model'])) {
            $this->data['model_id'] = $model->id;
        }

        return StolenCar::query()->insertOrIgnore($this->data);
    }

    public function saveMany()
    {
        // TODO: Implement saveMany() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function updateMany()
    {
        // TODO: Implement updateMany() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
