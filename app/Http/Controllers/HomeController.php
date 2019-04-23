<?php

namespace App\Http\Controllers;

use Auth;
use App\Store;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use App\Mail\ResetPassword;
use App\Mail\ConfirmPassword;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('store')->where('role', 'user')->get();
        return view('home', ['users' => $users]);
    }

    public function showUser($id)
    {
        $user = User::with('store')->where('id', $id)->first();
        return view('user.user_show', ['user' => $user]);
    }
    public function addUser()
    {
        return view('user/user_add');
    }

    public function createUser(CreateUserRequest $request)
    {
        $password = mt_rand(100000, 2147483647);
        $data = $request->all();
        $data['password'] = bcrypt($password);
        $username = $data['username'];
        User::create($data);
        \Mail::to($data['email'])
               ->send(new ConfirmPassword($username, $password));
        return redirect()->route('home')->with('alert', trans('alert.createUser'));
    }

    public function editUser($id)
    {
        return view('user.user_edit', ['id' => $id, 'user' => Auth::user()]);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if(Hash::check($data['oldpassword'], $user->password)) {
            $user->name = $data['name'];
            $user->password = bcrypt($data['password']);
            $user->new = true;
            $user->save();
            return redirect()->route('home')->with('alert', trans('alert.updateUser'));
        } else {
            return redirect()->back()->with('alert', trans('alert.oldPassword'));
        }

    }

    public function resetForm()
    {
        $users = User::where('username', '<>', 'admin')->get();
        return view('user.reset_password', ['users' => $users]);
    }

    public function resetPassword(Request $request)
    {
        $userPassword = '123456';
        $ids = $request->all();
        foreach ($ids['box'] as $id ) {
            $user = new User;
            $userid = $user->find($id);
            $userid->password = bcrypt($userPassword);
            $userid->save();
            \Mail::to($userid->email)
                   ->send(new ResetPassword($userid, $userPassword));
        }
        return redirect()->route('form.reset')
                         ->with('alert', trans('alert.resetPassword'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }
}
