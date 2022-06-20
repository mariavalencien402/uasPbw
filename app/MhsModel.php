<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MhsModel extends Model
{
    protected $table = 'mahasiswa402';

    protected $fillable = [
        'Nim','Nama', 'Gender', 'Jurusan', 'Bidang_Minat'
    ];
}
