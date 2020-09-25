<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ModelsListRequest;
use App\Http\Resources\MakesSearchResource;
use App\Repositories\MakesRepository;

class MakesListController extends Controller
{
    public function search(ModelsListRequest $request, MakesRepository $repository)
    {
        $data = $repository->search($request);

        return new MakesSearchResource($data);
    }
}
