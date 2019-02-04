<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertGovernmentalUnitAreas extends Migration
{
    private const STATE_FILE = '2019_01_04_000000_states.ini';
    private $governmental_unit_areas = 'governmental_unit_areas';

    public function up()
    {
        $states = parse_ini_file(self::STATE_FILE);

        foreach ($states as $state_name => $state_geo) {
            if (!DB::table($this->governmental_unit_areas)->where('name', $state_name)->exists()) {
                DB::table($this->governmental_unit_areas)->insertGetId(
                    [
                        'name' => $state_name,
                        'area' => $state_geo,
                    ]
                );
            }
        }
    }
}
