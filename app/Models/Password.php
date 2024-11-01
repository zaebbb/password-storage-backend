<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
  protected $fillable = [
    'password', 'name', 'content'
  ];
}
