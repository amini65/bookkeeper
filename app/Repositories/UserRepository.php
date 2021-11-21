<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function getUsers()
    {
        return User::query()->get();
    }
    public static function getUserById($id)
    {
        return User::query()->whereId($id)->first();
    }

    public static function saleAmount($user,$amount)
    {
        return $user::query()->update([
            'amount'=>$user->amount-$amount
        ]);
    }
    public static function depositAmount($user,$amount)
    {

        return $user::query()->update([
            'amount'=>$user->amount+$amount
        ]);
    }


    public function store($request,$image='')
    {
        return User::query()->create([
            'name'=>$request->name,
            'userName'=>$request->userName,
            'mobileNumber'=>$request->mobileNumber,
            'nickName'=>$request->nickName,
            'image'=>$image,
            'password'=>bcrypt(12345678),
        ]);
    }
    public function update($request,$user,$image='')
    {
        return $user->update([
            'name'=>$request->name,
            'userName'=>$request->userName,
            'mobileNumber'=>$request->mobileNumber,
            'nickName'=>$request->nickName,
            'image'=>$image,
        ]);
    }

}
