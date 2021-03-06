<?php

namespace Appleton\Taxes\Countries\US\Ohio;

use Appleton\Taxes\Classes\WorkerTaxes\Payroll;
use Appleton\Taxes\Classes\WorkerTaxes\Taxes\BaseOccupational;
use Appleton\Taxes\Models\Countries\US\Ohio\OhioIncomeTaxInformation;
use Illuminate\Database\Eloquent\Collection;

abstract class OhioSchoolDistrictEarnedIncomeTax extends BaseOccupational
{
    protected $tax_information;

    public function __construct(OhioIncomeTaxInformation $tax_information, Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_information = $tax_information;
    }

    abstract protected function getId(): string;

    abstract protected function getTaxRate(): float;

    public function doesApply(Collection $tax_areas): bool
    {
        return $this->tax_information->school_district_id === $this->getId();
    }

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * $this->getTaxRate(), 2);
    }
}
