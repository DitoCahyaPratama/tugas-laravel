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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->string('subkelas');
            $table->string('hari');
            $table->string('jam');
            $table->string('mapel');
            $table->string('teacher');
            $table->bigInteger('kelas_id')->unsigned()->nullable();
            $table->bigInteger('subkelas_id')->unsigned()->nullable();
            $table->bigInteger('hari_id')->unsigned()->nullable();
            $table->bigInteger('jam_id')->unsigned()->nullable();
            $table->bigInteger('mapel_id')->unsigned()->nullable();
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('subkelas_id')->references('id')->on('sub_kelas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('hari_id')->references('id')->on('haris')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('jam_id')->references('id')->on('jams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
};
