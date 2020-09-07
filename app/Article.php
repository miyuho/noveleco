<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array (
    'book_title' => 'required',
    'author' => 'required',
    'subtitle' => 'required',
    'body' => 'required',
    );
}
