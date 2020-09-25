<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Make extends EloquentModel
{
    protected $fillable = ['original_make_id', 'name'];

    public function models()
    {
        return $this->hasMany(Model::class);
    }
}
