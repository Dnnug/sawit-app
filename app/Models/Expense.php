<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'block_id',
        'date',
        'title',
        'category',
        'amount',
        'description'
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
