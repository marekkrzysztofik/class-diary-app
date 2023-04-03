<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ];

            $user = Teacher::create($input);
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['id'] = $user->id;
            $success['name'] = $user->name;
            $success['surname'] = $user->surname;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => "Teacher registered successfully"
            ];
        
        return response()->json($response, 200);
    }
    public function handleLogin(Request $request)
    {
        if ($request['type'] == 'Admin') {
            return $this->adminLogin($request);
        } else {
            return $this->coachLogin($request);
        }
    }
    public function adminLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['id'] = $user->id;
            $success['name'] = $user->name;
            $success['type'] = $user->type;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => "User logged successfully"
            ];
            return response()->json($response, 200);
        }
        return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
    }
    public function coachLogin(Request $request)
    {
        if (Auth::guard('coach')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('coach')->user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['id'] = $user->user_id;
            $success['name'] = $user->name;
            $success['type'] = $user->type;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => "User logged successfully"
            ];
            return response()->json($response, 200);
        }
        return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
    }
    public function getUsers()
    {
        return User::all();
    }
    public function getTeachers()
    {
        return Teacher::all();
    }
}
  