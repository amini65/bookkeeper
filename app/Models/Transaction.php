<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];

    const TYPE_SALE=1;
    const TYPE_DEPOSIT=2;


    const TYPE_ALL=[
        self::TYPE_SALE=>'sale',
        self::TYPE_DEPOSIT=>'deposit',
    ];


    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
