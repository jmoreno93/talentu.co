<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\UserCollection;
class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::latest()->paginate());
    }
    public function show(User $user)
    {
        return new UserCollection(array($user));
    }
    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required|string|max:10',
            'document_number' => 'required|string|max:20',
            'email' => 'required|string|max:90',
            'password' => 'required|string|max:30',
        ]);
        $err1 = User::where('email', $request['email'])->first();
        $err2 = User::where('document_type', $request['document_type'])
                ->where('document_number', $request['document_number'])->first();
        if($err1 != null || $err2 != null)
        {
            $error = '';
            $errors = [];
            if($err1 != null)
            {
                $error = "Email is duplicated\n";
                $errors['email'] = ['Email is duplicated'];
            }
            if($err2 != null)
            {
                $error = $error.'Document type and document number is duplicated';
                $errors['document_type'] = ['Document type and document number is duplicated'];
                $errors['document_number'] = ['Document type and document number is duplicated'];
            }
            return response()->json([
                'message' => $error,
                'errors' => $errors,
            ], 422);
        }
        $user = User::create([
            'document_type' => $request['document_type'],
            'document_number' => $request['document_number'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
        return new UserCollection(array($user));
    }
    public function destroy($user)
    {
        $user = User::find($user);
        if($user == null)
        {
            return response()->json([
                'message' => "User doesn't exist",
                'errors' => '',
            ], 422);
        }
        $user->delete();
        return new UserCollection(array());
    }
}
