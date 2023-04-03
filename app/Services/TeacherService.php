<?php

namespace App\Services;

use App\Repositories\TeacherRepository;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TeacherService
{
  protected $teacherRepository;

  public function __construct(TeacherRepository $teacherRepository)
  {
    $this->teacherRepository = $teacherRepository;
  }
  public function getTeacherById($id)
  {
    return $this->teacherRepository->getTeacherById($id);
  }
  public function registerOrUpdateTeacher(Request $request)
  {
    $data = $request->all();
    if (array_key_exists("id", $data) && $data['id']) {
      $this->updateTeacher($request, $data["id"]);
    } else {
      $this->registerTeacher($request);
    }
  }
  public function updateTeacher(Request $request, $id)
  {
    $teacher = $this->teacherRepository->getTeacherById($id);
    $teacher->name = $request['name'];
    $teacher->surname = $request['surname'];
    $teacher->email = $request['email'];
    $this->teacherRepository->update($teacher);
  }
  public function registerTeacher(Request $request)
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
}
