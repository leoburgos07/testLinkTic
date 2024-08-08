<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date'
    ];

    private function setNameAttribute($value)
    {
        $this->attributes['name'] = trim(strtoupper($value), " ");
    }


    protected $dates = ['deleted_at'];
}
