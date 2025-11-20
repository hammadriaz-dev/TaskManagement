<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Task extends Model{

    protected $fillable = ['user_id', 'title', 'description', 'status'];

    public function user(){
      return  $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}