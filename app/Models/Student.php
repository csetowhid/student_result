<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'class_id',
    ];

    public function classname()
    {
        // return $this->belongsTo(Studentclass::class,'class_id');
        return $this->belongsTo(Studentclass::class,'class_id');
    }
}
