<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table = 'posts';
    //Primary key
    public $primaryKey = 'id';
    // Timestamp
    public $timeStamp = true;
    //set up one to many relationship post has one user
    public function user(){
        return $this->belongsTo('App\User');
    }

}
