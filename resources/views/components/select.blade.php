


<div class="col-md-3 col-xs-12 " style="margin-bottom: 20px;height: 20px;">
    <label >{{ $placeholder }} :</label>
    <select class="form-control select2"  name="{{ $name }}">
        <option value="0">{{__('selected')}}</option>
        {{ $slot }}
    </select>
</div>

{{--<select class="form-control select2" name="user_id">--}}
{{--    <option value="">انتخاب گزینه</option>--}}
{{--    @foreach(\App\User::where('role','!=','admin')->get() as $user)--}}
{{--        <option value="{!! $user->id !!}">{!! $user->name !!}</option>--}}
{{--    @endforeach--}}
{{--</select>--}}
