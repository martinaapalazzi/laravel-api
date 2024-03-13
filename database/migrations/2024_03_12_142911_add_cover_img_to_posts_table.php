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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('cover_img', 1024)
                  ->after('content')
                  ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'cover_img')) {
                $table->dropColumn('cover_img');
            }
            //se noi abbiamo una colonna cover_img nella tabella posts 
            //allora puoi eliminarla con il drop column
        });
    }
};
