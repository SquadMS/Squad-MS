<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use SquadMS\Foundation\Contracts\SquadMSUser;
use SquadMS\Servers\Contracts\SquadMSServersUserInterface;
use SquadMS\Servers\Traits\SquadMSServersUserTrait;

class User extends SquadMSUser implements SquadMSServersUserInterface
{
    use SquadMSServersUserTrait;
    
    public static function current() : ?self
    {
        return Auth::user();
    }
}