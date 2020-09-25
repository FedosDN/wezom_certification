<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * App\Models\StolenCar
 *
 * @property int $id
 * @property string $user_name
 * @property string $license_plate
 * @property string $color
 * @property string $vin
 * @property string $make
 * @property string $model
 * @property string $year
 * @property int|null $make_id
 * @property int|null $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar query()
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereLicensePlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereMakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereVin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StolenCar whereYear($value)
 * @mixin \Eloquent
 */
class StolenCar extends EloquentModel
{
    protected $fillable = [
        'user_name', 'licence_plate', 'color', 'vin', 'make', 'model', 'year', 'model_id', 'make_id', 'created_at', 'updated_at'
    ];

    public $timestamps = true;

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function model()
    {
        return $this->belongsTo(Model::class);
    }
}
