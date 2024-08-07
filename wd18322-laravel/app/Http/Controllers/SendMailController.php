<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function forgotPassword($username)
    {
        $user = User::where('username', $username)->first();
        $subject = 'Forgot Password';
        $username = $user->username;
        $resetPasswordLink = 'https://www.pinterest.com/pin/28006828927020775/';

        $content = 'checkcheck';

        Mail::mailer()->to($user->email)->send(new ForgotPassword($subject, $username, $content));

        return response()->json(['message' => 'Password reset email sent'], 200);
    }
}
