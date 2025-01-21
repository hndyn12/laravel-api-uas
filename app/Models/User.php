<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Validation\Validator;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        // 'level'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


     public function savings()
    {
        return $this->hasMany(Saving::class);
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
      public static function rules($process)
    {
        if ($process == 'insert') {
            return [
            'name' => 'required|string|max:225',
            'username'  => 'required|string|max:225',
            'password'  => 'required|string',
            // 'level' => 'required|enum:Administrator,Petugas',
            ];

        } elseif ($process == 'update') {
            return [
            'name' => 'required|string|max:225',
            'username'  => 'required|string|max:225',
            'password'  => 'required|string',
            // 'level' => 'required|enum:Administrator,Petugas'
            ];
        }
    }

    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
            'name' => 'required|string|max:225',
            'username'  => 'required|string|max:225',
            'password'  => 'required|string',
            // 'level' => 'required|enum:Administrator,Petugas',
        ];


        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('date', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa tanggal.');
        });
    }
}
