<?php

namespace App\Transformers;

class ImportMakesTransformer
{
    public static function transform(array $data)
    {
        $makes = $data['Results'];

        $transform = [];

        $now = now();

        foreach ($makes as $make) {
            $transform []= [
                'original_make_id' => $make['Make_ID'],
                'name' => $make['Make_Name'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $transform;
    }
}
