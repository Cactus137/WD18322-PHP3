<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenModal extends Component
{
    public $log_email;
    public $log_password;
    public $res_email;
    public $res_password;

    public function login()
    {
        $this->validate(
            [
                'log_email' => 'required|email',
                'log_password' => 'required',
            ],
            [
                'log_email.required' => 'Vui lòng nhập email.',
                'log_email.email' => 'Định dạng email không hợp lệ.',
                'log_password.required' => 'Vui lòng nhập mật khẩu.',
            ],
        );

        $user = User::where('email', $this->log_email)->first();

        if (Auth::attempt(['email' => $this->log_email, 'password' => $this->log_password])) {
            session()->put('user', $user); 
            $this->reset('log_email', 'log_password');

            $this->dispatch('hide-modal');

            return redirect()->route('home');
        } else {
            // put error to log_email: Tài khoản hoặc mật khẩu không chính xác 
            $this->addError('log_email', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function register()
    {
        $validatedData = $this->validate(
            [
                'res_email' => 'required|email|unique:users,email',
                'res_password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            ], 
            [
                'res_email.required' => 'Vui lòng nhập email.',
                'res_email.email' => 'Định dạng email không hợp lệ.',
                'res_email.unique' => 'Email đã tồn tại! Vui lòng sử dụng một email khác.',
                'res_password.required' => 'Vui lòng nhập mật khẩu.',
                'res_password.min' => 'Mật khẩu phải chứa ít nhất :min ký tự.',
                'res_password.regex' => 'Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường, một số và một ký tự đặc biệt.',
            ],
        );

        $dataRegister = [
            // Username = name email before @
            'username' => explode('@', $this->res_email)[0] . rand(1000, 9999),
            'full_name' => null,
            'avatar' => null,
            'dob' => null,
            'gender_id' => null,
            'email' => $this->res_email,
            'phone' => null,
            'address' => null,
            'role_id' => 2,
            'status_id' => 1,
            'password' => bcrypt($this->res_password),
        ];

        User::create($dataRegister);

        $this->reset('res_email', 'res_password');

        session()->flash('status', 'Đăng ký tài khoản thành công!');

        // return redirect()->back();
    }
    public function render()
    {
        return view('livewire.authen-modal');
    }
}
