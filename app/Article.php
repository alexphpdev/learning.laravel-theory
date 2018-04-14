<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
//    protected $table = 'articles';
//    protected $primaryKey = 'id';
//    public $incrementing = true;
//    public $timestamps = true;

    protected $fillable = ['name', 'text'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
