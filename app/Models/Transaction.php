<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    protected static function booted()
    {
       static::addGlobalScope(new Scopes\UserCheckScope());
    }
    
    #[Scope]
    protected function byUser(Builder $query, int $userId): void
    {
        $query->where('user_id', '=', $userId);
    }

    #[Scope]
    protected function byDate(Builder $query, string $date): void
    {
        $query->whereDate('date', $date);
    }

    #[Scope]
    protected function sortByDate(Builder $query, string $direction = 'asc'): void
    {
        $query->orderBy('date', $direction);
    }

    #[Scope]
    protected function byBetween(Builder $query, array $value): void
    {
        $query->whereBetween('date', $value);
    }

    #[Scope]
    protected function byMonth(Builder $query, array $value): void
    {
        $query->whereMonth('date', $value[0])
              ->whereYear('date', $value[1]);
    }

    #[Scope]
    public function countByQuerys(Builder $query): void
    {
        $query->selectRaw("
            COALESCE(SUM(CASE WHEN type = false THEN amount ELSE 0 END), 0) AS chiqim,
            COALESCE(SUM(CASE WHEN type = true THEN amount ELSE 0 END), 0) AS kirim
        ");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
