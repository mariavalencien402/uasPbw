<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswa402Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa402', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('Nim',8);
            $table->string('Nama', 60);
            $table->string('Gender', 10);
            $table->string('Jurusan', 30);
            $table->string('Bidang_Minat', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa402');
    }
}
