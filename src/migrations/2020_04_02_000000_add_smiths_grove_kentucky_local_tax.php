<?php

use Appleton\Taxes\Countries\US\Kentucky\SmithsGrove\SmithsGrove;
use Appleton\Taxes\Models\TaxArea;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddSmithsGroveKentuckyLocalTax extends Migration
{
    protected $governmental_unit_areas = 'governmental_unit_areas';
    protected $taxes = 'taxes';
    protected $tax_areas = 'tax_areas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $smiths_grove_gua_id = DB::table($this->governmental_unit_areas)->insertGetId([
            'name' => 'Smiths Grove, KY',
            'area' => '0106000020E61000000100000001030000000100000021000000D00A0C59DD8D55C0BBEEAD484C864240D13FC1C58A8D55C0E961687572864240F86A47718E8D55C03048FAB48A8642408507CDAE7B8D55C03656629E95864240FC885FB1868D55C0A1DAE044F4874240577A6D36568D55C045F30016F987424029C93A1C5D8D55C0103FFF3D788742408F6E8445458D55C04B3D0B42798742406991ED7C3F8D55C0D21742CEFB874240A912656F298D55C05A7F4B00FE8742409A94826E2F8D55C001C11C3D7E8742407E18213CDA8C55C09E978A8D79874240C0249529E68C55C0F54883DBDA864240A0A696ADF58C55C0CB64389ECF8642402D978DCEF98C55C03A77BB5E9A864240EDEF6C8FDE8C55C01EFAEE569686424066BFEE74E78C55C01FF5D72B2C864240AE44A0FA078D55C02DE8BD3104864240321AF9BCE28C55C0C1AC50A4FB854240C5C72764E78C55C08481E7DEC3854240F05014E8138D55C067EDB60BCD8542404B21904B1C8D55C0DF180280638542400AA01859328D55C0F62345645885424081785DBF608D55C0740B5D8940854240020F0C207C8D55C09944BDE0D384424050340F60918D55C021C9ACDEE1844240A6F0A0D9758D55C07218CC5F21854240D3BB783F6E8D55C09A081B9E5E85424076C1E09A3B8D55C016139B8F6B8542400FF10F5B7A8D55C0C18A53AD85854240E78A5242B08D55C070AFCC5B75854240ECBE6378EC8D55C09A25016A6A854240D00A0C59DD8D55C0BBEEAD484C864240'
        ]);


        $smiths_grove_tax_id = DB::table($this->taxes)->insertGetId([
            'name' => 'Smiths Grove Kentucky Tax',
            'class' => SmithsGrove::class,
        ]);

        DB::table($this->tax_areas)->insert([[
            'tax_id' => $smiths_grove_tax_id,
            'work_governmental_unit_area_id' => $smiths_grove_gua_id,
            'based' => TaxArea::BASED_ON_WORK_LOCATION,
        ]]);
    }
}