<?php

namespace Modules\User\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\Comment;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard_name = 'web';

    protected $fillable = ['name', 'email', 'password', 'created_by',];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}