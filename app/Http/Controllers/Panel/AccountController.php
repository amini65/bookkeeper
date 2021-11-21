<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountStoreRequest;
use App\Models\Account;
use App\Repositories\AccountRepository;

class AccountController extends Controller
{

    public $listTitle;
    public $createTitle;
    public $editTitle;

    public function __construct()
    {
        $this->listTitle=__('account lists');
        $this->createTitle=__('account create');
        $this->editTitle=__('account edit');
    }

    public function index(AccountRepository $accountRepository)
    {
        $lists=$accountRepository->getAccounts();

        return view('panel.account.list',compact('lists'))->with('title',$this->listTitle);
    }


    public function create()
    {
        return view('panel.account.create')->with('title', $this->createTitle);
    }


    public function store(AccountStoreRequest $request,AccountRepository $accountRepository)
    {

        $accountRepository->store($request);

        return redirect()->route("accounts.index")->with("flash_message",  __('flash message create success'));

    }


    public function show(Account $account)
    {
        //
    }


    public function edit(Account $account)
    {
        return view('panel.account.edit',compact('account'))->with('title', $this->editTitle);
    }


    public function update(AccountStoreRequest $request, Account $account,AccountRepository $accountRepository)
    {


        $accountRepository->update($request,$account);
        return redirect()->route("accounts.index")->with("flash_message", __('flash message edit success'));
    }


    public function destroy(Account  $account)
    {
        try {
            $account->delete();
            return redirect()->route('accounts.index')->with("flash_message",  __('flash message delete success'));

        } catch (\Exception $e) {
            return redirect()->route('accounts.index')->with("flash_message",  __('flash message error'));
        }

    }

}
