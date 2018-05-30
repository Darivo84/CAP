<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    protected $table = 'curriculum_vitae';
    protected $fillable = ['first_name','last_name', 'path'];
}
