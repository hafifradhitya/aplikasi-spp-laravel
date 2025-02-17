<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Kompetensi extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'kompetensi';
    protected $fillable = [
        'kompetensi_kelas',
    ];

    protected $primaryKey = 'id_kompetensi';
}
