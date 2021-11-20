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

                    <form class="" novalidate="" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
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

                        <x-input type="text" name="name" placeholder="{{ __('customer name') }}" />
                        <x-input type="text" name="nickName" placeholder="{{ __('customer nickName') }}" />
                        <x-input type="text" name="userName" placeholder="{{ __('userName') }}" />
                        <x-input type="text" name="mobileNumber" placeholder="{{ __('mobileNumber') }}" />
                        <x-input-file  name="image" placeholder="{{ __('image') }}" />


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
