<?php

namespace App\Actions;

use App\Models\Transaction;
use App\Models\User;

class UserBalanseAction
{
    public static function execute(User $user, Transaction $transaction): void
    {
        $amount = $transaction->amount;

        if ($transaction->type === "true") {
            if ($user->real_balance >= 0) {
                $user->balance += $amount;
                $user->real_balance += $amount;
            } else {
                $debt = abs($user->real_balance);
                $remaining = $amount - $debt;

                if ($remaining > 0) {
                    $user->balance += $remaining;
                }

                $user->real_balance += $amount;
            }
        } else {
            if ($user->balance >= $amount) {
                $user->balance -= $amount;
            } else {
                $user->balance = 0;
            }

            $user->real_balance -= $amount;
        }

        $user->save();
    }

}
