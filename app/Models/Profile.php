<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable=['users_id','address1','address2','city','state','postal_code','cardNumber'];

    protected $table="profile";
}
