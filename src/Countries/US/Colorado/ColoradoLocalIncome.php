<?php

namespace Appleton\Taxes\Countries\US\Colorado;

use Appleton\Taxes\Classes\BaseLocal;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

abstract class ColoradoLocalIncome extends BaseLocal
{
    abstract protected function getMonthlyWageAmount(): int;

    abstract protected function getMonthlyTaxAmount(): int;

    abstract protected function getLocalGovernmentalUnitArea(): stdClass;

    public function compute(Collection $tax_areas): float
    {
        $colorado = $tax_areas->first()->workGovernmentalUnitArea;
        $local_governmental_unit_area = $this->getLocalGovernmentalUnitArea();

        $local_mtd = $this->payroll->getMtdEarnings($local_governmental_unit_area, true);
        if ($local_mtd === 0) {
            return 0;
        }

        $local_mtd_previous = $this->payroll->getMtdEarnings($local_governmental_unit_area);
        $colorado_mtd = $this->payroll->getMtdEarnings($colorado, true);

        $first_local_wages_with_colorado_wages_over_amount = $local_mtd_previous === 0
            && $colorado_mtd >= $this->getMonthlyWageAmount();
        if ($first_local_wages_with_colorado_wages_over_amount) {
            $this->payroll->withholdTax($this->getMonthlyTaxAmount() / 100);
            return round($this->getMonthlyTaxAmount() / 100, 2);
        }

        $colorado_mtd_previous = $this->payroll->getMtdEarnings($colorado);

        $colorado_wages_cross_amount = $colorado_mtd_previous < $this->getMonthlyWageAmount()
            && $colorado_mtd >= $this->getMonthlyWageAmount();
        if ($colorado_wages_cross_amount) {
            $this->payroll->withholdTax($this->getMonthlyTaxAmount() / 100);
            return round($this->getMonthlyTaxAmount() / 100, 2);
        }

        return 0;
    }
}
