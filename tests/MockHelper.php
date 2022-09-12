<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 21:09
 */

namespace Tests;


use App\Models\User;

class MockHelper
{
    public static function mockUser() : User
    {
        $mockUser = User::create([
            'name' => 'mockUser',
            'email' => 'aaa@aaa.com',
            'password' => 'password'
        ]);

        return $mockUser->refresh();
    }
}
