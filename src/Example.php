<?php

namespace FreengersDev\Todo;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = 'example';

    protected $fillable = ['user_id', 'completed', 'todo'];
}
