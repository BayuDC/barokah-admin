<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form {
    public ?User $user;

    public $name;
    public $email;
    public $gender;
    public $phone;
    public $address;

    public function rules() {
        return [
            'name' => 'required',
            'email' => [
                'required', 'email',
                Rule::unique('users', 'email')->ignore($this->user->id)
            ],
            'gender' => 'nullable|in:M,F',
            'phone' => 'nullable',
            'address' => 'nullable',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus sesuai format',
            'email.unique' => 'Email tersebut sudah terdaftar',
            'gender.in' => 'Jenis kelamin tidak valid'
        ];
    }

    public function load(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->address = $user->address;
    }
    public function update() {
        $body = $this->validate();
        $this->user->update($body);
    }
}
