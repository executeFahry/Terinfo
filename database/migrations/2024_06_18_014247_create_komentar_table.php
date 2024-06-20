<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('id_komentar');
            $table->text('isi');
            $table->foreignId('comment_id')->nullable();
            $table->integer('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_berita');
            $table->foreign('id_berita')->references('id_berita')->on('berita')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('komentar');
    }
}
