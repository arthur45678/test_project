<?php

namespace App\Policies;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PatientPolicy
{

    use HandlesAuthorization;

    public function view(User $user, Patient $patient)
    {
        return $user->id === $patient->doctor_id;
    }

    public function update(User $user, Patient $patient)
    {
        return $user->id === $patient->doctor_id;
    }

    public function delete(User $user, Patient $patient)
    {
        return $user->id === $patient->doctor_id;
    }
}
