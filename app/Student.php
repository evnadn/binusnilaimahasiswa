<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nama', 'quis', 'tugas', 'absensi', 'praktek', 'uas', 'ratanilai', 'bobot'];
}
