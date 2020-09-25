<?php

namespace App\Http\Controllers\Api;

use App\Export\StolenCarsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReportIndexRequest;
use App\Http\Requests\Api\ReportStolenRequest;
use App\Http\Requests\Api\UpdateReportRequest;
use App\Http\Resources\StolenCarsCollection;
use App\Jobs\ReportStolenJob;
use App\Models\StolenCar;
use App\Repositories\StolenCarRepository;
use App\Services\Vin\ParseVinInterface;
use Illuminate\Http\Request;

class ReportStolenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ReportIndexRequest $request
     * @param StolenCarRepository $stolenCars
     * @return StolenCarsCollection
     */
    public function index(ReportIndexRequest $request, StolenCarRepository $stolenCars)
    {
        $data = $stolenCars->paginate($request);

        return new StolenCarsCollection($data);
    }

    public function export(ReportIndexRequest $request, StolenCarRepository $stolenCars)
    {
        $exportQuery = $stolenCars->export($request);

        return (new StolenCarsExport($exportQuery))->download('stolen_cars.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReportStolenRequest $request
     * @param ParseVinInterface $parser
     * @param StolenCarRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReportStolenRequest $request, ParseVinInterface $parser, StolenCarRepository $repository)
    {
        $vinInfo = $parser->parse($request->validated()['vin']);
        $report = array_merge($request->validated(), $vinInfo);

        $repository->setData($report)->save();

        return response()->json(['message' => 'Report Added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateReportRequest $request, $id)
    {
        $report = StolenCar::query()->findOrFail($id);
        $report->fill($request->validated());
        $report->save();

        return response()->json(['message' => 'Report updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $report = StolenCar::query()->findOrFail($id);

        $report->delete();

        return response()->json(['message' => 'Report deleted!']);
    }
}
