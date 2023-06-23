<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_for_human',
        'tk_name'
    ];
}
