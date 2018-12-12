<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    protected $table = 'functions';
    protected $fillable = [
    	'name',
    	'project_id',
    ];
}
