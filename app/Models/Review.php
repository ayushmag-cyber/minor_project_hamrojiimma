<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\User;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'service_id',
        'review',
        'rating',
        'image',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}