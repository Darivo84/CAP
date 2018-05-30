<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes;
    protected $table = 'about_us';
}
