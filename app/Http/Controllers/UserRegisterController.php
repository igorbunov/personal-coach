<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegister;
use App\Models\User;

class UserRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UserRegister $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserRegister $request)
    {
        $data = User::create($request->validated());

        return response()->json($data);

    }
}
