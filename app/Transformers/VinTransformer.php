<?php

namespace App\Transformers;

class VinTransformer
{
    public static function transform(array $data)
    {
        $data = $data[0] ?? $data;

        $now = now();

        return [
            'make' => $data['Make'],
            'model' => $data['Model'],
            'year' => $data['ModelYear'],
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
