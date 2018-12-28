<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSecuritySettingFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ip')->nullable()->after('password');
            $table->string('city')->nullable()->after('ip');
            $table->string('country')->nullable()->after('city');
            $table->integer('security')->nullable()->after('country')->default(1);
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
            $table->dropColumn('ip');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('security');
        });
    }
}
