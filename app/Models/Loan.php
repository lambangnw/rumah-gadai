<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'item_type',
        'estimated_value',
        'loan_amount',
        'loan_term',
        'specifications',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'specifications' => 'array',
        'estimated_value' => 'decimal:0',
        'loan_amount' => 'decimal:0',
    ];

    /**
     * Get the user that owns the loan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the formatted estimated value.
     */
    public function getFormattedEstimatedValueAttribute()
    {
        return 'Rp ' . number_format($this->estimated_value, 0, ',', '.');
    }

    /**
     * Get the formatted loan amount.
     */
    public function getFormattedLoanAmountAttribute()
    {
        return 'Rp ' . number_format($this->loan_amount, 0, ',', '.');
    }
} 