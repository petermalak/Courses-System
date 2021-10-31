<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'code', 'speaker','description'];

    public static $cast = [
        'title' => 'required',
        'code' => 'required',
        'speaker' => 'required',
        'description' => 'required'
    ];

}
