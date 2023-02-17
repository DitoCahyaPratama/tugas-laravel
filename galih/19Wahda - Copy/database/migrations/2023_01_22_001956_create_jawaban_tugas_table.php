<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_tugas', function (Blueprint $table) {
            $table->id();
            $table->longText('jawaban');
            $table->longText('file')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['selesai','belum'])->default('belum');
            $table->bigInteger('tugas_id')->unsigned()->nullable();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tugas_id')->references('id')->on('tugas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_tugas');
    }
};