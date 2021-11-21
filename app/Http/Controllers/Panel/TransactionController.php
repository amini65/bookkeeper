<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\DepositStoreRequest;
use App\Http\Requests\Transaction\SaleStoreRequest;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    private $_transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->_transactionRepository=$transactionRepository;
    }

    public function sale()
    {
        return view('panel.transaction.sale')->with('title',__('sale create'));
    }
    public function saleStore(SaleStoreRequest $request)
    {
        $this->_transactionRepository->sateStore($request);
        return redirect()->route("sale.form")->with("flash_message", __('flash message create success'));
    }

    public function deposit()
    {
        return view('panel.transaction.deposit')->with('title',__('deposit create'));
    }
    public function depositStore(DepositStoreRequest $request)
    {
        $this->_transactionRepository->depositStore($request);
        return redirect()->route("deposit.form")->with("flash_message", __('flash message create success'));
    }
}
