<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['url_key', 'url_site', 'views', 'status'];
}
