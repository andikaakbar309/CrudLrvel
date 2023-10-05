<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'seq', 'status', 'is_deleted'];
}