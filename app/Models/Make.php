<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * App\Models\Make
 *
 * @property int $id
 * @property int $original_make_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Model[] $models
 * @property-read int|null $models_count
 * @method static \Illuminate\Database\Eloquent\Builder|Make newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Make newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Make query()
 * @method static \Illuminate\Database\Eloquent\Builder|Make whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Make whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Make whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Make whereOriginalMakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Make whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Make extends EloquentModel
{
    protected $fillable = ['original_make_id', 'name', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function models()
    {
        return $this->hasMany(Model::class);
    }
}
