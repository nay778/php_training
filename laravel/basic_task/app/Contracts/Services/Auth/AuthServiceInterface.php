<?php
namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface AuthServiceInterface
{
  /**
   * To save user
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function userLogin(Request $request);
  
  /**
   * To save user
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function saveUser(Request $request);
  
  /**
   * logout
   */
  public function userOut();
}