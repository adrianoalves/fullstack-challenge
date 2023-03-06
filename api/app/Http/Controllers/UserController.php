<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(Request $request)
    {
        return UserResource::collection(User::query()->paginate(5));
    }
}
