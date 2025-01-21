<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Validation\Validator;

class Grade extends Model
{
       protected $fillable = [
        'grade'
    ];

    public static function rules($process)
    {
        if ($process == 'insert') {
            return [
                'grade' => 'required|string',
            ];

        } elseif ($process == 'update') {
            return [
                'grade' => 'string',
            ];
        }
    }

    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
            'grade' => 'required|Grade',
        ];


        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('date', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa tanggal.');
        });
    }

}
