<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Return all users (wrap in try-catch)
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        try {
            return User::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
