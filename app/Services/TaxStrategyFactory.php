<?php

namespace App\Services;

use App\Models\TaxBand;

class TaxStrategyFactory
{
    public function create(float $grossAnnualSalary): TaxCalculationStrategy
    {
        // Retrieve the tax band based on the salary range
        $taxBand = TaxBand::where('annual_salary_range_min', '<', $grossAnnualSalary)
            ->where(function ($query) use ($grossAnnualSalary) {
                $query->where('annual_salary_range_max', '>=', $grossAnnualSalary)
                    ->orWhereNull('annual_salary_range_max'); // for open-ended bands
            })
            ->first();

        if (!$taxBand) {
            throw new \Exception("No valid tax band found for the given salary.");
        }

        // Use specific strategies if needed
        // if ($taxBand->name === 'Band A') {
        //     return new BandATaxStrategy();
        // }

        // Otherwise, return the generic strategy
        return new GenericTaxStrategy($taxBand);
    }
}
