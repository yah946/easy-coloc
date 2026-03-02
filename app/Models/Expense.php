<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'amount',
        'category_id',
        'user_id',
        'colocation_id',
    ];
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function payer()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'payments', 'expense_id', 'user_id')->withPivot('amount', 'paid_at')->withTimestamps();
    }
}
