<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'kcons', 'serv_chrg', 'vat', 'nhil', 'getfund', 'strl_levi', 'gov_levi', 'total_chrg', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
