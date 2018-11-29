<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function user()
    {
    	return $this->haveMany(User::class);
    }
}
