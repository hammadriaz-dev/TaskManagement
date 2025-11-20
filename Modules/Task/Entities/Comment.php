<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Task\Entities\Task;

class Comment extends Model
{
    
    protected $fillable = ['user_id', 'task_id', 'comment'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }
    
}