<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer("user_type_id")->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign("users_user_type_id_foreign");
            $table->dropColumn("user_type_id");
        });

        Schema::dropIfExists("user_types");
    }
}
