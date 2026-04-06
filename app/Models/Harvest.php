<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = ['block_id', 'harvest_date', 'weight_count', 'worker_count', 'notes'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
