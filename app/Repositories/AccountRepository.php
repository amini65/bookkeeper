<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{

    public function getAccounts()
    {
        return Account::query()->get();
    }
    public function getAccountById($id)
    {
        return Account::query()->whereId($id)->first();
    }


    public function store($request)
    {
        Account::query()->create([
           'name'=>$request->name,
           'card_number'=>$request->card_number,
           'account_number'=>$request->account_number,
        ]);
    }

    public function update($request,$account)
    {
        return $account->update([
            'name'=>$request->name,
            'card_number'=>$request->card_number,
            'account_number'=>$request->account_number,
        ]);
    }
}
