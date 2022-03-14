<?php
 
 namespace App\Services\AuthService;
 
use Illuminate\Http\Request;

interface AuthInterface
{
    public function register(Request $request);

    public function login(Array $input);

    public function logout(Request $request);

    public function me(Request $request);
}