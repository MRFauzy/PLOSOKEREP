<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;
    protected $table = 'profil_desa';

    protected $fillable = [
        'visi_misi',
        
    ];

}
