<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'jdoe@example.com',
                'password' => '123',
                'age' => 25
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'password' => '123',
                'age' => 30
            ],
            [
                'id' => 3,
                'name' => 'Bob Smith',
                'email' => 'bobsmith@example.com',
                'password' => '123',
                'age' => 35
            ],
            [
                'id' => 4,
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'password' => '123',
                'age' => 28
            ],
            [
                'id' => 5,
                'name' => 'Mike Brown',
                'email' => 'mikebrown@example.com',
                'password' => '123',
                'age' => 32
            ]
        ];
        return view('users.profile', ['users'=> $users]);
    }
}
