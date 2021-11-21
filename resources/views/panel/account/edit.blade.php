@extends('panel.layouts.master')


@section('content')


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{!! $title !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate="" action="{{  route('accounts.update' , [$account->id])}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PATCH') }}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <x-input type="text" name="name" value="{!! $account->name !!}" placeholder="{{ __('account name') }}" />
                        <x-input type="text" name="card_number" value="{!! $account->card_number !!}" placeholder="{{ __('account card_number') }}" />
                        <x-input type="text" name="account_number" value="{!! $account->account_number !!}" placeholder="{{ __('account account_number') }}" />

                        <div class="clearfix"></div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

