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

    public function paginate($request)
    {
        return $this->paginatedQuery($request)->paginate($request->per_page ?: 10);
    }

    public function export($request)
    {
        return $this->paginatedQuery($request);
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

    protected function paginatedQuery($request)
    {
        $stolenCarsQuery = StolenCar::query();

        $stolenCarsQuery->when($request->order_by, function ($query) use ($request) {
            $query->orderBy($request->order_by, $request->direction);
        });

        $stolenCarsQuery->when($request->search, function ($query) use ($request) {
            $query->where('user_name', 'LIKE', '%'. $request->search .'%');
            $query->orWhere('license_plate', 'LIKE', '%'. $request->search .'%');
            $query->orWhere('make', 'LIKE', '%'. $request->search .'%');
            $query->orWhere('model', 'LIKE', '%'. $request->search .'%');
            $query->orWhere('vin', 'LIKE', '%'. $request->search .'%');
        });

        return $stolenCarsQuery;
    }
}
