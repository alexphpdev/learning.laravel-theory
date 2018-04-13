<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    protected $table = 'articles';
//    protected $primaryKey = 'id';
//    public $incrementing = true;
//    public $timestamps = true;

    protected $fillable = ['name', 'text'];




}
