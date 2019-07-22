<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolDistrictIdToOhioTable extends Migration
{
    public function up()
    {
        Schema::table('ohio_income_tax_information', function (Blueprint $table) {
            $table->integer('school_district_id')->nullable();
            $table->string('school_district_name')->nullable();
        });
    }
}
