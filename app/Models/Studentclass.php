<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
    ];


    public function cls_name()
    {
        return $this->belongsTo(Studentclass::class);
    }
}
