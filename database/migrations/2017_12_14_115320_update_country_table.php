<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        if(!Schema::hasColumn('countries','alpha_code_3')){
            Schema::table('countries', function (Blueprint $table) {
                $table->string('alpha_code_3')->nullable()->after('alpha_code');
            });
        }

        if(!Schema::hasColumn('countries','native_name')){
            Schema::table('countries', function (Blueprint $table) {
                $table->string('native_name')->nullable()->after('alpha_code_3');
            });
        }

        if(!Schema::hasColumn('countries','alternate_spellings')){
            Schema::table('countries', function (Blueprint $table) {
                $table->text('alternate_spellings')->nullable()->after('native_name');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        if(Schema::hasColumn('countries','alpha_code_3')){
            Schema::table('countries', function (Blueprint $table) {
                $table->dropColumn('alpha_code_3');
            });
        }

        if(Schema::hasColumn('countries','native_name')){
            Schema::table('countries', function (Blueprint $table) {
                $table->dropColumn('native_name');
            });
        }

        if(Schema::hasColumn('countries','alternate_spellings')){
            Schema::table('countries', function (Blueprint $table) {
                $table->dropColumn('alternate_spellings');
            });
        }
    }
}
