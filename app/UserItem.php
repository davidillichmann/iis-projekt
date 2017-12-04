<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserItem extends Authenticatable
{
    use Notifiable;

    protected $table = "iis_user";
    protected $primaryKey = "iis_userid";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getId()
    {
        return $this->attributes['iis_userid'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    public function getPhone()
    {
        return $this->attributes['phone'];
    }
    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function isAdmin()
    {
        return ($this->getRole() == 'admin') ? true : false;
    }

    protected $fillable = [
        'iis_userid', 'name', 'email', 'password', 'phone', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTicketItemsByUserId()
    {
        return iisTicketRepository()->getItemsByUserId($this->getId());
    }
}
