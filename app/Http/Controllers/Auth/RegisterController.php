<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register-index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'integer'],
            'permission_group_id' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ]);
    }
    protected function validator2(array $data, $id=null)
    {
      // echo "<pre>"; print_r($id); echo "</pre>"; die;
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'integer'],
            'permission_group_id' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'pass' => $data['password'],
            'user_type' => $data['user_type'],
            'permission_group_id' => $data['permission_group_id'],
            'status' => $data['status'],
        ]);
    }


    public function showRegistrationForm(Request $request)
    {
        $model = new User;
        return view('auth.register',compact('model'));
    }

    public function update(Request $request, $id)
    {
      $model = User::where('id',$id)->first();
        if($request->isMethod('post')){
          if($this->validator2($request->all(), $id)->validate()){
            $model = User::where('id',$id)->first();
            $model->name = $request->name;
            $model->email = $request->email;
            $model->user_type = $request->user_type;
            $model->permission_group_id = $request->permission_group_id;
            $model->status = $request->status;
            $model->password = Hash::make($request->password);
            $model->pass = $request->password;
            if ($model->save()) {
                return $request->wantsJson()
                            ? new JsonResponse([], 201)
                            : redirect($this->redirectPath());
            }
          }
        }
        return view('auth.register',compact('model'));
    }



    public function register(Request $request)
    {
        if($this->validator($request->all())->validate()){
        }
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());

    }

    public function index()
    {
      // dd(Auth::user()->id);
        $models = User::all();
        return view("auth.index",compact('models'));
    }
}
