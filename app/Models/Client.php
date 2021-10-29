<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $casts = [
        'last_warning_sent_at' => 'datetime',
        'last_temp_warning_sent_at' => 'datetime',
        'last_hum_warning_sent_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'location',
        'street',
        'number',
        'zip_code',
        'city',
    ];

    public function datavalues(){
        return $this->hasMany(Datavalue::class);
    }
}
