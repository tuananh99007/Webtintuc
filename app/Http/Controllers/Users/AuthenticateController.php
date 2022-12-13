<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\RegistAccount;
use App\Repositories\Interface\AuthenticateRepositoryInterfaceUsers;
use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{
    private $authenticateRepository;
    private $usersRepositoty;

    public function __construct(AuthenticateRepositoryInterfaceUsers $inputauthenticateRepository,
                                UsersRepositoryInterface             $inputusersRepository)
    {
        $this->authenticateRepository = $inputauthenticateRepository;
        $this->usersRepositoty = $inputusersRepository;
    }

    public function login()
    {
        $messageNotify = session('message_noify', null);
        return view('users.authenticate.login', compact('messageNotify'));
    }

    public function postlogin(Request $request)
    {
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $this->validateLogin($request);
        $credentials = [
            'email' => $email,
            'password' => $password,
            'is_deleted' => 0
        ];
        if (Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('users.home.index');
        }
        return redirect()->route('users.authenticate.login');
    }

    private function validateLogin($request)
    {
        $request->validate([
            'email' => 'required|min:1|max:255',
            'password' => 'required|min:1|max:255',
        ]);
    }

    public function register()
    {
        return view('users.authenticate.register');
    }

    public function postRegister(Request $request)
    {
        $this->validatePostRegister($request);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $avatar = $request->file('avatar');
        if ($avatar == null) {
            $avatar = asset('assets/users/images/thor.jpg');
        }
        $usersEmail = $this->usersRepositoty->usersEmail($email);
        if (empty($usersEmail)) {
            Mail::to($email)->send(new RegistAccount());
            $this->authenticateRepository->usersRegister($name, $email, $password, $avatar);
            return redirect()->route('users.authenticate.login');
        }
        return redirect()->back();
    }

    private function validatePostRegister($request)
    {
        $request->validate([
            'name' => 'min:1|max:255',
            'email' => 'unique:users|min:1|max:255',
            'password' => 'confirmed|min:1|max:255',
        ]);
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->route('users.authenticate.login');
    }

    public function forgotpassword()
    {
        return view('users.authenticate.forgotpassword');
    }

    public function postforgotpassword(Request $request)
    {
        $this->validateEmail($request);
        $email = $request->input('email', null);
        $this->authenticateRepository->userUpdatePassword($email);
        $usersEmail = $this->usersRepositoty->usersEmail($email);
        if (!empty($usersEmail)) {
            Mail::to($email)->send(new ForgotPassword($email));
            session()->flash('message_noify', 'Check email để đổi mật khẩu của bạn');
            return redirect()->route('users.authenticate.login');
        }
        return redirect()->route('users.authenticate.forgotpassword');
    }

    private function validateEmail($request)
    {
        $request->validate([
            'email' => 'required|exists:users|min:1|max:255',
        ]);
    }

    public function changepassword()
    {
        return view('users.authenticate.changepassword');
    }

    public function postchangepassword(Request $request)
    {
        $this->validatePassword($request);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $this->authenticateRepository->usersPostchangepassword($email, $password);
        return redirect()->route('users.authenticate.login');
    }

    private function validatePassword($request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:1|max:255',
        ]);
    }
}
