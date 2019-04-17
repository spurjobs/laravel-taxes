<?php

use Appleton\Taxes\Countries\US\Indiana\IndianaIncome\IndianaIncome;
use Appleton\Taxes\Countries\US\Indiana\IndianaUnemployment\IndianaUnemployment;
use Appleton\Taxes\Models\TaxArea;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateIndianaIncomeTaxInformation extends Migration
{
    public function up(): void
    {
        Schema::create('indiana_income_tax_information', static function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('personal_exemptions')->default(0);
            $table->decimal('dependent_exemptions')->default(0);
            $table->integer('additional_withholding')->default(0);
            $table->integer('additional_county_withholding')->default(0);
            $table->boolean('exempt')->default(false);
        });

        $income_tax_id = DB::table('taxes')->insertGetId([
            'name' => 'Indiana Income Tax',
            'class' => IndianaIncome::class,
        ]);

        $unemployment_tax_id = DB::table('taxes')->insertGetId([
            'name' => 'Indiana Unemployment Tax',
            'class' => IndianaUnemployment::class,
        ]);

        $id = DB::table('governmental_unit_areas')->where('name', 'Indiana')->first()->id;
        DB::table('tax_areas')->insert([
            'tax_id' => $income_tax_id,
            'work_governmental_unit_area_id' => $id,
            'based' => TaxArea::BASED_ON_WORK_LOCATION,
        ]);
        DB::table('tax_areas')->insert([
            'tax_id' => $unemployment_tax_id,
            'home_governmental_unit_area_id' => $id,
            'based' => TaxArea::BASED_ON_HOME_LOCATION,
        ]);
    }
    public function down(): void
    {
        $income_tax_id = DB::table('taxes')->where('class', IndianaIncome::class)
            ->first()->id;
        DB::table('tax_areas')->where('tax_id', $income_tax_id)->delete();

        $unemployment_tax_id = DB::table('taxes')->where('class', IndianaUnemployment::class)
            ->first()->id;
        DB::table('tax_areas')->where('tax_id', $unemployment_tax_id)->delete();

        DB::table('taxes')->where('id', $income_tax_id)->delete();
        DB::table('taxes')->where('id', $unemployment_tax_id)->delete();

        Schema::drop('indiana_income_tax_information');
    }
}
