<?php

namespace App\Services\Import;

use App\Transformers\ImportMakesTransformer;
use Illuminate\Support\Facades\Http;

class ImportMakes implements ImportMakesInterface
{
    public function makesList()
    {
        return $this->transformResponse($this->getFromApi());
    }

    protected function getFromApi()
    {
        $apiUrl = config('services.cars_api.makes_url');
        $response = Http::get($apiUrl);

        return $response->json();
    }

    protected function transformResponse(array $data)
    {
        return ImportMakesTransformer::transform($data);
    }
}
