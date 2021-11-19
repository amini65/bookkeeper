
<div class="col-md-6 col-sm-6 col-xs-12">
    <label for="{{ $name }}">{{ $placeholder }} :</label>
    <input type="{{ $type }}" id="{{ $name }}" class="form-control" name="{{ $name }}"
           placeholder="{{ $placeholder }}"
           {{ $attributes }}
           value="{!! isset($value) ? $value : old($name) !!}"
    />
    @error($name)
    <div class="alert">{{ $message }}</div>
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>


