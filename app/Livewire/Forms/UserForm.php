<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Livewire\Attributes\Validate;

class UserForm extends Form {

    public ?User $user;

    public $name;
    public $email;
    public $gender;
    public $phone;
    public $address;

    #[Validate('nullable')]
    #[Validate('image', message: 'File harus berupa file gambar')]
    #[Validate('max:1024', message: 'Ukuran file maksimal 1 MB')]
    public $picture;
    public $pictureUrl;

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
        $this->pictureUrl = $user['picture_url'];
    }
    public function update() {
        $body = $this->validate();

        if ($this->picture) {
            $body['picture_url'] = $this->picture
                ->store(options: ['disk' => 'uploads']);
        }

        $this->user->update($body);
    }
}
