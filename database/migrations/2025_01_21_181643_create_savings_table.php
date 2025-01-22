<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->char('student_id', 10); // Mengubah tipe data menjadi char untuk mengakomodasi NIS yang berupa string
            $table->integer('setor')->nullable()->default(0);
            $table->integer('tarik')->nullable()->default(0);
            $table->date('tgl');
            $table->enum('jenis',['ST','TR']);
            $table->timestamps();

            $table->foreign('student_id')->references('nis')->on('students')->onDelete('cascade'); // Mengubah referensi menjadi NIS
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings');
    }
};
