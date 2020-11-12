<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'nama', 'company', 'email'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }
}
