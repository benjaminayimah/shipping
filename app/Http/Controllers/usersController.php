<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class usersController extends Controller {

    public function getDashboard(){
        return view('admin.dashboard');
    }
    public function getLoginpage(){
        $address = DB::table('homes')->where('type', 'Address')->first();
        $email = DB::table('homes')->where('type', 'email')->first();
        $phone = DB::table('homes')->where('type', 'Phone')->get();
        $quickLinks = DB::table('homes')->where('type', 'QuickLinks')->get();
        return view('users-login', [
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'quickLinks' => $quickLinks
        ]);
    }
    public function postRegisterUser(Request $request){

        $type = $request['state'];
        if ($type == '11'){
            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'name' => 'required|max:120',
                'role' => 'required',
                'password' => 'required|confirmed|min:4'
            ]);
            $thisRole = $request['role'];
            $role = '1';
            $access = true;
            if ($thisRole == '0'){
                $role = '0';
                $access = false;
            }elseif ($thisRole == '1'){
                $role = '1';
            }elseif ($thisRole == '2'){
                $role = '2';
            }
            $user = new User();
            $user->email = $request['email'];
            $user->name = $request['name'];
            $user->password = bcrypt($request['password']);
            $user->access_level = $access;
            $user->user_role = $role;
            $user->save();
            return redirect()->back()->with('status', 'Account created!');
        }elseif ($type == '22' && $request['inputID']){
            $id = $request['inputID'];
            $type = $request['type'];
            $check = DB::table('users')->where('id', $id)->first();
            if ($check->user_role != '3'){
                if ($type == 'name'){
                    $this->validate($request, [
                        'name' => 'required|max:120',
                    ]);
                    $user = User::find($id);
                    $user->name = $request['name'];
                    $user->update();
                    return redirect()->back()->with('status', 'successfully updated!');
                }elseif ($type == 'email'){
                    $this->validate($request, [
                        'email' => 'required|email|unique:users',
                    ]);
                    $user = User::find($id);
                    $user->email = $request['email'];
                    $user->update();
                    return redirect()->back()->with('status', 'successfully updated!');
                }elseif ($type == 'password'){
                    $this->validate($request, [
                        'password' => 'required|min:4'
                    ]);
                    $user = User::find($id);
                    $user->password = bcrypt($request['password']);
                    $user->update();
                    return redirect()->back()->with('status', 'successfully updated!');
                }elseif ($type == 'role'){
                    $this->validate($request, [
                        'role' => 'required'
                    ]);
                    $thisRole = $request['role'];
                    $role = '1';
                    $access = true;
                    if ($thisRole == '0'){
                        $role = '0';
                        $access = false;
                    }elseif ($thisRole == '1'){
                        $role = '1';
                    }elseif ($thisRole == '2'){
                        $role = '2';
                    }
                    $user = User::find($id);
                    $user->user_role = $role;
                    $user->access_level = $access;
                    $user->update();
                    return redirect()->back()->with('status', 'successfully updated!');
                }else{
                    return redirect()->back()->with('status2', 'Error occurred!');
                }
            }else{
                return redirect()->back()->with('status2', 'Not Authorized!');
            }
        }

    }
    public function postDelUser(Request $request){
        //check if authorised to del
        $id = $request['inputId'];
        $check = DB::table('users')->where('id', $id)->first();
        if ($check->id != '1'){
            $del = User::find($id);
            $del->delete();
            return redirect()->back()->with('status', 'successfully deleted!');
        }elseif ($check->id == '1'){
            $del = User::find(Auth::id());
            $del->delete();
            return redirect()->back()->with('status', 'successfully deleted!');
        }
    }

    public function loginUser(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request['_token'];
        $rememberMe = $request['rememberMe'];
        $email = $request['email'];
        $password = $request['password'];
        if ($rememberMe == 'on'){
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                // The user is being remembered...
                $user = User::where('email', $request->email)->first();

                if($user->is_admin()){
                    return redirect()->route('dashboard');
                }
                return redirect()->route('welcome');
            }
            return redirect()->back()->with('status2', 'Wrong Credentials');
        }else{
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                // Authentication passed...
                $user = User::where('email', $request->email)->first();

                if($user->is_admin()){
                    return redirect()->route('dashboard');
                }
                return redirect()->route('welcome');
            }
            return redirect()->back()->with('status2', 'Wrong Credentials');
        }


    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('welcome');
    }

}
