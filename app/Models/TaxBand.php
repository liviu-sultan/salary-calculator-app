<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxBand extends Model
{
    use HasFactory;

    protected $table = 'tax_bands';

    // Define the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'annual_salary_range_min',
        'annual_salary_range_max',
        'rate',
    ];
}
