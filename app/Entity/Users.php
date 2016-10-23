<?php
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uid';

    //public $timestamps = false;
}
