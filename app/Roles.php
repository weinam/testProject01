<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = [
		'role_name',
		'function',
		'project_id',
    ];

    public function project()
    {
    	return $this->hasOne(Project::class);
    }
}
