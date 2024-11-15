<?php

namespace App\Models;

use App\Traits\Storable;
use App\Traits\Updatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    use HasFactory, Storable, Updatable;

    protected $table="todos";

    protected $fillable=[
        'titulli',
        'pershkrimi',
        'user_id',
        'statusi'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
