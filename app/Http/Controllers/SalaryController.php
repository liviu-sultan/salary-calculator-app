<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryController extends Controller
{
    public function show(Request $request): View
    {
        if ($request->isMethod('GET')) {
            return view('salary');
        }

        return view('salary', [
            'grossSalary' =>  $request->input('gross_salary'),
            'grossMonthlySalary' => 123,
            'netAnnualSalary' => 123,
            'netMonthlySalary' => 123,
            'annualTaxPaid' => 123,
            'monthlyTaxPaid' => 123,
        ]);
    }
}
