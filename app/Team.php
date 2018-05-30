<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    protected $table = 'team';
    protected $fillable = ['first_name','last_name','title', 'profile_picture', 'experience', 'qualifications', 'email', 'tel'];
}
