<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Validation\Validator;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'nama_siswa',
        'jekel',
        'grade_id',
        'status',
        'th_masuk'
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function savings() {
        return $this->hasOne(Saving::class);
    }

     public static function rules($process)
    {
        if ($process == 'insert') {
            return [
                'nis' => 'required|numeric',
                'nama_siswa' => 'required|string|max:225',
                'grade_id' => 'required|string',
                'th_masuk' => 'required|numeric',
            ];

        } elseif ($process == 'update') {
            return [
                'nis' => 'required|numeric',
                'nama_siswa' => 'required|string|max:225',
                'grade_id' => 'required|string',
                'th_masuk' => 'required|numeric',
            ];
        }
    }

    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
            'nis' => 'NIS',
            'nama_siswa' => 'Nama Siswa',
            'grade_id' => 'Grade',
            'th_masuk' => 'Tahun Masuk',
        ];


        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('date', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa tanggal.');
        });
    }


}
