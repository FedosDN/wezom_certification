<?php

namespace App\Services\Vin;

use App\Exceptions\InvalidVinException;
use App\Transformers\VinTransformer;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class ParseUSAVin implements ParseVinInterface
{
    /**
     * @param string $vin
     * @return array|mixed
     * @throws InvalidVinException
     */
    public function parse(string $vin)
    {
        $vinUrl = str_replace('{VIN}', $vin, config('services.cars_api.vin_url'));

        $response = Http::get($vinUrl)->json();
        $response = $response['Results'];

        $valid = $this->checkValidVin($response);

        if (! $valid) {
            throw new InvalidVinException();
        }

        return VinTransformer::transform($response);
    }

    protected function checkValidVin(array $response)
    {
        $check = function ($error) {
            //if key with error not exists
            if (false === $error) {
                return true;
            }
            return ! str_contains($error, 'Invalid character');
        };

        if (array_key_exists(0, $response)) {
            $valid = $check(Arr::get($response[0], 'AdditionalErrorText', false));
        } else {
            $valid = $check(Arr::get($response, 'AdditionalErrorText', false));
        }

        return $valid;
    }
}
