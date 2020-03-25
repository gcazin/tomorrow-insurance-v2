<?php

namespace App\Http\Controllers\Auth;

use App\Skill;
use App\Skill_pivot;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'role_id' => ['required', 'string'],
            'tags' => ['sometimes'],
            'name' => ['required', 'string', 'max:25', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User|void
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->role_id = $data['role_id'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->departement = $data['departement'];
        if(! is_null($data['tel']) && ! is_null($data['adresse'])) {
            $user->tel = $data['tel'];
            $user->adresse = $data['adresse'];
        }
        $user->save();

        /*if(!is_null($data['skills'])) {
            for ($i = 0; $i < count($data['skills']); $i++) {
                $skills = new Skill_pivot();
                $skills->user_id = $user->id;
                $skills->skill_id = $data['skills'][$i];
                $skills->save();
            }
        }*/

        return $user;
    }
}
