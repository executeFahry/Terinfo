<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCommentIdFieldInKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->foreignId('comment_id')->nullable()->constrained('komentar', 'id_komentar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->dropForeign(['comment_id']);
            $table->dropColumn('comment_id');
        });
    }
}
