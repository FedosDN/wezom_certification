<?php

namespace App\Services\Vin;

interface ParseVinInterface
{
    public function parse(string $vin);
}
