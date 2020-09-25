<?php

namespace App\Transformers;

use App\Models\Make;

class ImportModelsTransformer
{
    public static function transform(Make $make, array $data)
    {
        $models = $data['Results'];

        $transform = [];

        $now = now();

        foreach ($models as $model) {
            $transform []= [
                'make_id' => $make->id,
                'model_id' => $model['Model_ID'],
                'name' => $model['Model_Name'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $transform;
    }
}
