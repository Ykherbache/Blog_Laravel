<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Posts', function (Blueprint $table) {
            $table->text('Content')->change();
            $table->bigInteger('author_id')->change();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->bigInteger('commentator_id')->change();
            $table->bigInteger('post_id')->change();
            $table->text('content')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
