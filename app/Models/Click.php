<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{

    protected $fillable = [
        'ip'
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
