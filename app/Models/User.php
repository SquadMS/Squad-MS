<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use SquadMS\Foundation\Contracts\SquadMSUser;

class User extends SquadMSUser
{
    public static function current() : ?self
    {
        return Auth::user();
    }
}
