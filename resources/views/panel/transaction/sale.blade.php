@extends('panel.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('panel/css/jquery.md.bootstrap.datetimepicker.style.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/select2.css') }}">
@endsection
@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success alert-dismissible"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{!! $title !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form class="" novalidate="" method="post" action="{{ route('sale.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <x-select name="user_id" placeholder="{{ __('customer name') }}">
                            @foreach(\App\Models\User::whereRole(\App\Models\User::TYPE_CUSTOMER)->get() as $user)
                                <option value="{!! $user->id !!}" {{ (old('user_id')==$user->id)?'selected':'' }}>{!! $user->name !!}</option>
                            @endforeach
                        </x-select>
                        <x-select name="product_id" placeholder="{{ __('product name') }}">
                            @foreach(\App\Models\Product::all() as $product)
                                <option value="{!! $product->id !!}" {{ (old('product_id')==$product->id)?'selected':'' }}>{!! $product->name !!}</option>
                            @endforeach
                        </x-select>
                        <x-input type="number" name="weight" placeholder="{{ __('weight') }}" />
                        <x-input type="number" name="amount" placeholder="{{ __('amount') }}" />
                        <div class="col-md-3 col-xs-12 ">
                            <label for="mobile_number" >{{ __('date') }}</label>
                                <input type="text" name="date" id="start"
                                       class="form-control start"
                                       placeholder="{{ __('date') }}"
                                >
                        </div>

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
@section('js')
    <script src="{{ asset('panel/js/jquery.md.bootstrap.datetimepicker.js') }}"></script>
    <script src="{{ asset('panel/js/select2.full.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2()

        })

        $("#start").MdPersianDateTimePicker({
            targetTextSelector: "#start",
            textFormat: " yyyy/MM/dd ",
            isGregorian: false,
            modalMode: false,
            englishNumber: true,
            calendarViewOnChange: function (param1) {
                console.log(param1);
            }
        });
    </script>
@endsection
