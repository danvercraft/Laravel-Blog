<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceCategory extends Model
{
    /** @use HasFactory<\Database\Factories\FinanceCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'icon',
        'color',
    ];
}
