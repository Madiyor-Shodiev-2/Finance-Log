<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $table = "transactions";

    protected $fillable =
        [
            "user_id",
            "amount",
            "description",
            'type',
            "date",
        ];

    protected $casts = [
        'date' => 'datetime',
        'amount' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
