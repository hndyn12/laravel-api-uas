<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Validation\Validator;

class Saving extends Model
{
        protected $fillable = [
        'student_id',
        'setor',
        'tarik',
        'tgl',
        'jenis',
    ];


      public static function rules($process)
    {
        if ($process == 'insert') {
            return [
                'student_id' => 'required|numeric',
                'tgl' => 'required|date',
                'setor' => 'required|numeric',
                'tarik' => 'required|numeric',
                'jenis' => 'required|in:ST,TR',
            ];

        } elseif ($process == 'update') {
            return [
                'student_id' => 'numeric',
                'tgl' => 'date',
                'setor' => 'numeric',
                'tarik' => 'numeric',
                'jenis' => 'in:ST,TR',
            ];
        }
    }

    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
                'student_id' => 'student_id',
                'tgl' => 'Tanggal Transaksi',
                'setor' => 'Setor',
                'tarik' => 'Tarik',
                'jenis' => 'Jenis Transaksi',
        ];


        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('date', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa tanggal.');
        });
    }
}
