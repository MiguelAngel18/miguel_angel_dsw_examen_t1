<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class Message extends Model
{
    protected $fillable = ['text','img'];

    protected $table = 'messages';
}
