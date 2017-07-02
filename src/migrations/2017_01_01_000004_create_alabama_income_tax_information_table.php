<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAlabamaIncomeTaxInformationTable extends Migration
{
    protected $alabama_income_tax_information = 'alabama_income_tax_information';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->alabama_income_tax_information, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('filing_status');
            $table->integer('dependents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->alabama_income_tax_information);
    }
}