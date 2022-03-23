<?php
 
namespace App\Services\AuthService;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class AuthService implements AuthInterface
{

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function login(Array $input)
    {
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'token' => $token,
        ], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'message' => 'User logged out successfully'
            ], Response::HTTP_OK);
        } catch (JWTException $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function me(Request $request)
    {
        $user = JWTAuth::authenticate(JWTAuth::getToken());

        return response()->json(['user' => $user]);
    }
}