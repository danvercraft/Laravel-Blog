<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceRegistry extends Model
{
    /** @use HasFactory<\Database\Factories\FinanceRegistryFactory> */
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'type',
        'finance_category_id',
    ];

    public function financeCategory()
    {
        return $this->belongsTo(FinanceCategory::class);
    }
}
