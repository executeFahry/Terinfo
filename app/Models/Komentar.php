<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';
    protected $guarded = [];

    public function childrenComments()
    {
        return $this->hasMany(Komentar::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
