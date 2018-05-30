<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsefulDocument extends Model
{
    use SoftDeletes;
    protected $table = 'useful_documents';
    protected $fillable = ['title', 'description'];
}
