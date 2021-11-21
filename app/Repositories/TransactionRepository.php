<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Models\Transaction;

class TransactionRepository
{

    public function sateStore($request)
    {
        $user=UserRepository::getUserById($request->user_id);
        $transaction=Transaction::query()->create([
           'user_id' =>$request->user_id,
           'type' =>Transaction::TYPE_SALE,
           'amount' =>$request->amount,
            'cash' =>$user->amount-$request->amount,
           'date' =>$request->date,
        ]);
        Sale::query()->create([
            'transaction_id'=>$transaction->id,
            'product_id'=>$request->product_id,
            'weight'=>$request->weight,
        ]);
        UserRepository::saleAmount($user,$request->amount);
    }

    public function depositStore($request)
    {
        $user=UserRepository::getUserById($request->user_id);
        $transaction=Transaction::query()->create([
           'user_id' =>$request->user_id,
           'type' =>Transaction::TYPE_DEPOSIT,
           'amount' =>$request->amount,
           'cash' =>$user->amount+$request->amount,
           'date' =>$request->date,
           'account_id' =>$request->account_id,
        ]);
        UserRepository::depositAmount($user,$request->amount);
    }
}
