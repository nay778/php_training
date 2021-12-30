<?php

namespace App\Dao\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Auth\AuthDaoInterface;

class AuthDao implements AuthDaoInterface
{
  /**
   * To save user
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function userLogin(Request $request)
  {

    return $request->only('email', 'password');
  }

  /**
   * To save user
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function saveUser(Request $request)
  {
    $data = $request->all();
    $check = $this->create($data);
    return $check;
  }
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password'])
    ]);
  }
}
