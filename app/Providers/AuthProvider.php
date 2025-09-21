<?php

namespace App\Policies;

use App\Models\Label;
use App\Models\User;

class LabelPolicy
{
    /**
     * Determine whether the user can manage labels (create, update).
     */
    public function manage(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can delete labels.
     */
    public function delete(User $user, Label $label): bool
    {
        return $user->role === 'admin';
    }
}
