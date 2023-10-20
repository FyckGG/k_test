<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\UserService;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreated;

class UserController extends Controller
{
    public function create()
    {
        return view('pages.create-user-page');
    }

    public function store(StoreUserRequest $request, UserService $userService, EmailService $emailService)
    {
        $request->validated();

       $newUser = $userService->storeUser($request->userName, $request->userEmail, $request->userPhone);

       $emailService->sendToAdmin(new UserCreated($newUser));

       return response()->json([
        'status' => true,
        'message' => 'User has been stored successfully',
    ], Response::HTTP_CREATED);
    }
}
