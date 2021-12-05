<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Request;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'user_avatar' => ['nullable', 'image', 'mimes:jpg,bmp,png,gif'],
        ])->validate();


        $path = 'uploads/avatars' . '/' . $input['user_avatar'];
/*        $path = null;
        if ($input['user_avatar']->hasFile()) :
            $user_name = $input['name'];
            $user_avatar = $input['user_avatar']->file('user_avatar');
            $path = $user_avatar->store($user_name, [
                'disk' => 'uploads',
            ]);
        endif;*/

/*        dd(
            $input,
            $input['user_avatar'],
            $input['user_avatar']->file('user_avatar'),
        //            Request::input('user_avatar'),
        //            $input['user_avatar'],
        );*/

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'avatar_url' => $path,
//            'avatar_url' => $input['user_avatar'],
        ]);
    }
}
