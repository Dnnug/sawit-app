<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'name',
        'area',
        'year_planted',
        'tree_count',
        'description'
    ];

    public function harvests()
    {
        return $this->hasMany(Harvest::class);
    }
}
