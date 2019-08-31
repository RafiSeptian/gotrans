<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsTo(Services::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }
}
