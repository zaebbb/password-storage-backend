<?php

namespace App\Http\Controllers\aPI\v1;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseStatus;
use Illuminate\Support\Facades\Response;
USE App\Http\Controllers\Controller;
use App\Validators\PasswordValidator;

class PasswordController extends Controller
{
  public function all() {
    $passwords = Password::all();

    return Response::json([
      'items' => $passwords,
      'success'=> true,
    ], ResponseStatus::HTTP_OK);
  }
  
  public function create(Request $request) {
    $validator = new PasswordValidator($request);

    if (!$validator->isValid()) {
      return Response::json([
        'success' => false,
        'validation' => $validator->getMessageErrors(),
      ], ResponseStatus::HTTP_UNPROCESSABLE_ENTITY); 
    }

    $passwordItem = new Password();

    $passwordItem->name = $request->name;
    $passwordItem->content = $request->content;
    $passwordItem->password = $request->password;

    $passwordItem->save();

    return Response::json([
      'success' => true,
    ], ResponseStatus::HTTP_OK);
  }
  
  public function update(Request $request, $id) {
    $passwordItem = Password::find($id);

    if ($passwordItem) {
      return Response::json([
        'success'=> false,
      ], ResponseStatus::HTTP_NOT_FOUND);
    }

    $validator = new PasswordValidator($request);

    if (!$validator->isValid()) {
      return Response::json([
        'success' => false,
        'validation' => $validator->getMessageErrors(),
      ], ResponseStatus::HTTP_UNPROCESSABLE_ENTITY); 
    }

    $passwordItem->name = $request->name;
    $passwordItem->content = $request->content;
    $passwordItem->password = $request->password;

    $passwordItem->save();

    return Response::json([
      'success' => true,
    ], ResponseStatus::HTTP_OK);
  }

  public function delete($id) {
    $password = Password::find($id);
    
    if (!$password) {
      return Response::json([
        'success'=> false,
      ], ResponseStatus::HTTP_NOT_FOUND);
    }

    $password->delete();

    return Response::json([
      'success'=> true,
    ], ResponseStatus::HTTP_OK);
  }
}
