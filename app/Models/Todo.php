<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Mahasiswa;

class Todo extends Model
{
    use HasFactory;
    public $with = ['mahasiswa'];
    public $guarded = ['id'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
