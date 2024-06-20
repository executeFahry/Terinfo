<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id_menu')->autoIncrement();
            $table->string('nama_menu');
            $table->enum('jenis_menu', ['url', 'page']);
            $table->string('link_menu');
            $table->string('target_menu');
            $table->integer('urutan_menu');
            $table->integer('parent_menu')->nullable();
            $table->boolean('status_menu')->default(1);
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
        Schema::dropIfExists('menu');
    }
}
