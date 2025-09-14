<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'role' => ['required', 'string', 'in:jobseeker,employer,admin']
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $user->assignRole($input['role']);
        // $user = User::find(1);
        // $user->assignRole('employer');
        if ($input['role'] === 'employer') {
            $user->givePermissionTo(['create job', 'edit job', 'delete job']);
        }

        if ($input['role'] === 'jobseeker') {
            $user->givePermissionTo(['apply job']);
        }

        if ($input['role'] === 'admin') {
            $user->givePermissionTo(Permission::all());
        }

        return $user;
    }
}
