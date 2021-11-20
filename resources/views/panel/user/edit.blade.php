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

                    <form class="form-horizontal form-label-left" novalidate="" action="{{  route('users.update' , [$user->id])}}" method="post" enctype="multipart/form-data">
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
                        <x-input type="text" name="name" value="{!! $user->name !!}" placeholder="{{ __('customer name') }}" />
                        <x-input type="text" name="nickName" value="{!! $user->nickName !!}" placeholder="{{ __('customer nickName') }}" />
                        <x-input type="text" name="userName" value="{!! $user->userName !!}" placeholder="{{ __('userName') }}" />
                        <x-input type="text" name="mobileNumber" value="{!! $user->mobileNumber !!}" placeholder="{{ __('mobileNumber') }}" />
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

