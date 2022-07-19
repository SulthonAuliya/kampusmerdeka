<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['programs'];

    public function programs(){
        return $this->belongsTo(Program::class, 'program_id');
    }
}
