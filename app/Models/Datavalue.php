<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datavalue extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
    ];


    protected $fillable = [
        'client_id',
        'temperature',
        'humidity',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
