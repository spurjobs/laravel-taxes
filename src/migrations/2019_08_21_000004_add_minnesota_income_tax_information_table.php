<?php
 use Appleton\Taxes\Countries\US\Minnesota\MinnesotaIncome\MinnesotaIncome;
use Appleton\Taxes\Countries\US\Minnesota\MinnesotaUnemployment\MinnesotaUnemployment;
use Appleton\Taxes\Models\TaxArea;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMinnesotaIncomeTaxInformationTable extends Migration
{
    public function up()
    {
        Schema::create('minnesota_income_tax_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allowances')->default(0);
            $table->string('filing_status')->nullable();
            $table->boolean('exempt')->default(false);
        });

        $income_tax_id = DB::table('taxes')->insertGetId([
            'name' => 'Minnesota Income Tax',
            'class' => MinnesotaIncome::class,
        ]);

        $unemployment_tax_id = DB::table('taxes')->insertGetId([
            'name' => 'Minnesota Unemployment Tax',
            'class' => MinnesotaUnemployment::class,
        ]);

        $id = DB::table('governmental_unit_areas')->where('name', 'Minnesota')->first()->id;

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
        $tax_id = DB::table('taxes')->where('class', MinnesotaIncome::class)->id;
        $unemployment_id = DB::table('taxes')->where('class', MinnesotaUnemployment::class)->id;

        DB::table('tax_areas')->where('tax_id', $unemployment_id)->delete();
        DB::table('tax_areas')->where('tax_id', $tax_id)->delete();

        DB::table('taxes')->where('id', $unemployment_id)->delete();
        DB::table('taxes')->where('id', $tax_id)->delete();

        Schema::drop('minnesota_income_tax_information');
    }
}
