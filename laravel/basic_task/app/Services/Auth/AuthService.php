<?php
namespace App\Services\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
  private $authDao;

  public function __construct(AuthDaoInterface $authDaoInterface)
  {
    $this->authDao = $authDaoInterface;
  }

   /**
   * To save user
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function userLogin(Request $request){

    return $this->authDao->userLogin($request);
    
  }

  /**
   * To save user
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function saveUser(Request $request){

    return $this->authDao->saveUser($request);

  }

  /**
   * logout
   */
  public function userOut(){
    Session::flush();
    Auth::logout();
  }
  
}