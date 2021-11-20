
<div class="col-md-3 col-xs-12 " style="margin-bottom: 20px">
    <label for="{{ $name }}">{{ $placeholder }} :</label>
    <input type="file" id="{{ $name }}" class="form-control" name="{{ $name }}"
           placeholder="{{ $placeholder }}"
           {{ $attributes }}
           value="{!! isset($value) ? $value : old($name) !!}"
    />
    @error($name)
    <div class="alert">{{ $message }}</div>
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>


