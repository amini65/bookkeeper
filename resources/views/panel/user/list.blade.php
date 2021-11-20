@extends('panel.layouts.master')



@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success alert-dismissible"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{!! $title !!}
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                    <a  href="{{ route('users.create' ) }}" class="btn btn-success btn-lg">ایجاد</a>
                </p>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('nickName') }}</th>
                        <th>{{ __('mobileNumber') }}</th>
                        <th>{{ __('userName') }}</th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($lists)
                        @forelse($lists as $list)
                            <tr>
                                <td>{!! $list->name !!}</td>
                                <td>{!! $list->nickName !!}</td>
                                <td>{!! $list->mobileNumber !!}</td>
                                <td>{!! $list->userName !!}</td>
                               <td>
                                    <a href="{{ route('users.edit' , [$list->id ]) }}" class="btn btn-primary">ویرایش</a>
                                    <a href="{!! route('users.destroy', [$list->id]) !!}" data-method="delete"
                                       data-token="{{csrf_token()}}" class="btn btn-danger"  data-confirm="{{ __('data confirm') }}">حذف</a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    هیچ پارامتری تاکنون ثبت نشده است

                                </td>
                            </tr>
                        @endforelse
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

