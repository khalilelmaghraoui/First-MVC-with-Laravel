<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // we can change the default values of attributes by creating another ones and initialize it  like the example below
//    protected $table = 'another_name';
  //  protected $primaryKey = 'post_id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'body'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}


