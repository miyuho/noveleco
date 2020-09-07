<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array (
    'user_id' => 'required',
    'favorite_user_id' => 'required',
    );
}
