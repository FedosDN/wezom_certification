<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $fillable = ['make_id', 'model_id', 'name'];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
