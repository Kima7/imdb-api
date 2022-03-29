<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        return $this->authService->register($request);
    }

    /**
     * Login for existing user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        return $this->authService->login($input);
    }

    /**
     * Logout current logon user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        //JWTAuth::parseToken()->invalidate();
        //return JWTAuth::parseToken()->isBlacklisted();
        //Auth::invalidate(true);
        //return true;
        //echo($request);
         //$this->validate($request, [
         //    'token' => 'required'
         //]);
        
        return $this->authService->logout($request);
    }

    /**
     * Get current logon user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        //return Auth::user();
        //echo($request);
         //$this->validate($request, [
           //  'token' => 'required'
         //]);

        return $this->authService->me($request);
    }
}
