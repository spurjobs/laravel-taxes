<?php

namespace Appleton\Taxes\Tests\Unit;

use Appleton\Taxes\Classes\WorkerTaxes\GeoPoint;
use Appleton\Taxes\Classes\WorkerTaxes\Wage;
use Appleton\Taxes\Classes\WorkerTaxes\WageType;
use Appleton\Taxes\Models\TaxArea;
use Appleton\Taxes\Tests\Unit\UnitTestCase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait TestModelCreator
{
    protected function makeAreaAtPoint(GeoPoint $location): int
    {
        $latitude = $location->getLatitude();
        $longitude = $location->getLongitude();

        return DB::table('governmental_unit_areas')->insertGetId([
            'name' => "point (${latitude}, ${longitude})",
            'area' => DB::raw("ST_SetSRID(ST_MakePoint(${latitude}, ${longitude}),4326)"),
        ]);
    }

    protected function makeAreaAtCircle(float $latitude, float $longitude): int
    {
        return DB::table('governmental_unit_areas')->insertGetId([
            'name' => "circle (${latitude}, ${longitude}) 10km radius",
            'area' => DB::raw("ST_Buffer(ST_SetSRID(ST_MakePoint(${latitude}, ${longitude}),4326), 10)"),
        ]);
    }

    protected function makeTax(string $class): int
    {
        return DB::table('taxes')->insertGetId([
            'name' => 'Tax '.$class,
            'class' => $class,
        ]);
    }

    protected function makeTaxArea(string $class, int $govt_id): void
    {
        $tax_id = $this->makeTax($class);

        DB::table('tax_areas')->insertGetId([
            'based' => TaxArea::BASED_ON_WORK_LOCATION,
            'tax_id' => $tax_id,
            'work_governmental_unit_area_id' => $govt_id,
        ]);
    }

    protected function makeWage(
        GeoPoint $location,
        int $amount_in_cents = UnitTestCase::DEFAULT_SHIFT_WAGES,
        int $pay_check_tip_amount_in_cents = null,
        int $take_home_tip_amount_in_cents = null,
        ?int $minutes_worked = UnitTestCase::DEFAULT_MINUTES_WORKED
    ): Wage {
        return new Wage(
            WageType::SHIFT,
            Carbon::now(),
            $location,
            $amount_in_cents,
            $pay_check_tip_amount_in_cents === null ? 0 : $pay_check_tip_amount_in_cents,
            $take_home_tip_amount_in_cents === null ? 0 : $take_home_tip_amount_in_cents,
            $minutes_worked === null ? UnitTestCase::DEFAULT_MINUTES_WORKED : $minutes_worked,
            collect([])
        );
    }

    protected function makeWageWithAdditionalTax(
        GeoPoint $location,
        string $additional_tax,
        int $amount_in_cents = UnitTestCase::DEFAULT_SHIFT_WAGES
    ): Wage {
        return new Wage(
            WageType::SHIFT,
            Carbon::now(),
            $location,
            $amount_in_cents,
            0,
            0,
            0,
            collect([$additional_tax])
        );
    }

    protected function makeSupplementalWage(
        GeoPoint $location,
        int $amount_in_cents
    ): Wage {
        return new Wage(
            WageType::SUPPLEMENTAL,
            Carbon::now(),
            $location,
            $amount_in_cents,
            0,
            0,
            0,
            collect([])
        );
    }

    protected function makeWageAtDate(
        Carbon $date,
        GeoPoint $location,
        int $amount_in_cents = UnitTestCase::DEFAULT_SHIFT_WAGES
    ): Wage {
        return new Wage(
            WageType::SHIFT,
            $date,
            $location,
            $amount_in_cents,
            0,
            0,
            0,
            collect([])
        );
    }

    protected function makeAdjustmentWageAtDate(
        Carbon $date,
        GeoPoint $location,
        int $amount_in_cents
    ): Wage {
        return new Wage(
            WageType::ADJUSTMENT,
            $date,
            $location,
            $amount_in_cents,
            0,
            0,
            0,
            collect([])
        );
    }

    protected function makeSalary(
        GeoPoint $location,
        int $amount_in_cents = UnitTestCase::DEFAULT_SHIFT_WAGES,
        int $pay_check_tip_amount_in_cents = null,
        int $take_home_tip_amount_in_cents = null,
        ?int $minutes_worked = UnitTestCase::DEFAULT_MINUTES_WORKED
    ): Wage {
        return new Wage(
            WageType::SALARY,
            Carbon::now(),
            $location,
            $amount_in_cents,
            $pay_check_tip_amount_in_cents === null ? 0 : $pay_check_tip_amount_in_cents,
            $take_home_tip_amount_in_cents === null ? 0 : $take_home_tip_amount_in_cents,
            $minutes_worked === null ? UnitTestCase::DEFAULT_MINUTES_WORKED : $minutes_worked,
            collect([])
        );
    }
}
