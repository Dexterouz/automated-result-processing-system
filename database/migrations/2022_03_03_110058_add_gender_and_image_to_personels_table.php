<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderAndImageToPersonelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personels', function (Blueprint $table) {
            $table->string('gender')->after('last_name');
            $table->string('image')->after('account_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personels', function (Blueprint $table) {
            Schema::dropIfExists('staffs');
        });
    }
}
