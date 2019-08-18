<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  protected $table = 'todos';
  protected $fillable = [
    'title', 'body'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
