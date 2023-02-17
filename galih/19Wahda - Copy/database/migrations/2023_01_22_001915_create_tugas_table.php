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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('soal');
            $table->string('description')->nullable();
            $table->longText('file')->nullable();
            $table->enum('status', ['aktif','tertunda','kadeluarsa']);
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->bigInteger('subkelas_id')->unsigned()->nullable();
            $table->bigInteger('mapel_id')->unsigned()->nullable();
            $table->dateTime('deadline');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('subkelas_id')->references('id')->on('sub_kelas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
};
