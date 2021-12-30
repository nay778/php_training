<?php
namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface AuthDaoInterface
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

}