<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Auth\AuthServiceInterface;

class AuthController extends Controller
{
    private $authInterface;
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     * @param Request $request
     * @return response()
     */
    public function postLogin(Request $request)
    {
        //$request->validate([
        //    'email' => 'required',
        //    'password' => 'required',
        //]); 
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withInput()
                ->withErrors($validator);
        }

        $credentials = $this->authInterface->userLogin($request);
        if (Auth::attempt($credentials)) {

            return redirect()->route('tasklist');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     * @param Request $request
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = $this->authInterface->saveUser($request);
        return redirect()->route('tasklist');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return redirect()->route('tasklist');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {

        $this->authInterface->userOut();
        return Redirect('login');
    }
}
