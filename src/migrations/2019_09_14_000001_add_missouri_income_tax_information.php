<?php

use Appleton\Taxes\Countries\US\Missouri\MissouriIncome\MissouriIncome;
use Appleton\Taxes\Countries\US\Missouri\MissouriUnemployment\MissouriUnemployment;
use Appleton\Taxes\Models\TaxArea;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMissouriIncomeTaxInformation extends Migration
{
    public function up(): void
    {
        Schema::create('missouri_income_tax_information', static function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allowances')->default(0);
            $table->integer('additional_withholding')->default(0);
            $table->string('filing_status');
            $table->boolean('exempt')->default(false);
        });

        $income_tax_id = DB::table('taxes')->insertGetId([
            'name' => 'Missouri Income Tax',
            'class' => MissouriIncome::class,
        ]);

        $unemployment_tax_id = DB::table('taxes')->insertGetId([
            'name' => 'Missouri Unemployment Tax',
            'class' => MissouriUnemployment::class,
        ]);

        $id = DB::table('governmental_unit_areas')->where('name', 'Missouri')->first()->id;

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
        $tax_id = DB::table('taxes')->where('class', MissouriIncome::class)->id;
        $unemployment_id = DB::table('taxes')->where('class', MissouriUnemployment::class)->id;

        DB::table('tax_areas')->where('tax_id', $unemployment_id)->delete();
        DB::table('tax_areas')->where('tax_id', $tax_id)->delete();

        DB::table('taxes')->where('id', $unemployment_id)->delete();
        DB::table('taxes')->where('id', $tax_id)->delete();

        Schema::drop('missouri_income_tax_information');
    }
}
