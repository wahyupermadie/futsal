<?php

namespace App\Policies;

use App\Employee;
use App\Field;
use Illuminate\Auth\Access\HandlesAuthorization;

class FieldPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the field.
     *
     * @param  \App\User  $user
     * @param  \App\Field  $field
     * @return mixed
     */
    public function view(Employee $user, Field $field)
    {
        return $user->futsal_id === $field->futsal_id;
    }

    /**
     * Determine whether the user can create fields.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the field.
     *
     * @param  \App\User  $user
     * @param  \App\Field  $field
     * @return mixed
     */
    public function update(User $user, Field $field)
    {
        return $user->futsal_id === $field->futsal_id;
    }

    /**
     * Determine whether the user can delete the field.
     *
     * @param  \App\User  $user
     * @param  \App\Field  $field
     * @return mixed
     */
    public function delete(User $user, Field $field)
    {
        return $user->futsal_id === $field->futsal_id;
    }
}
