<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ModifyBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berita', function (Blueprint $table) {
            if (!Schema::hasColumn('berita', 'slug')) {
                $table->string('slug')->nullable()->after('judul');
            }
        });

        // Update existing records to have unique slugs
        DB::statement("UPDATE berita SET slug = CONCAT('slug-', id_berita) WHERE slug IS NULL OR slug = ''");

        // Now make the column unique
        Schema::table('berita', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
}
