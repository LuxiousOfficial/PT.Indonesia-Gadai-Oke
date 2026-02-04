<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Taskk extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'deadline', 'status'];
}
