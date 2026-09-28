<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_user', 'nama_user', 'email', 'password', 'role', 'tgl_daftar', 'foto_profil', 'status_user',
    ];

    protected $hidden = [
        'password',
    ];
}
