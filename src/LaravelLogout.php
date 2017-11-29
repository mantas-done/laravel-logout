<?php namespace MantasDone\LaravelLogoutUser;

use App\User;

class LaravelLogout
{
    public static function logout($user_id)
    {
        $user = User::findOrFail($user_id);

        $user->logout_logins_older_than = time();
        $user->save();

        session()->forget('login_time');
    }
}