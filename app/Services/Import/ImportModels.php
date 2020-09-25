<?php

namespace App\Services\Import;

use App\Models\Make;
use App\Transformers\ImportModelsTransformer;
use Illuminate\Support\Facades\Http;

class ImportModels implements ImportModelsInterface
{
    public function modelsList()
    {
        return $this->getFromApi();
    }

    protected function getFromApi()
    {
        foreach (Make::query()->cursor() as $make) {
            $apiUrl = config('services.cars_api.models_url');
            //get models for current make
            $apiUrl = str_replace('{MAKE_ID}', $make->original_make_id, $apiUrl);

            $response = Http::get($apiUrl)->json();

            yield $this->transformResponse($make, $response);
        }
    }

    protected function transformResponse(Make $make, array $data)
    {
        return ImportModelsTransformer::transform($make, $data);
    }
}
