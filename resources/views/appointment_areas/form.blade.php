<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($appointment_area->area) ? $appointment_area->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_area') ? 'has-error' : ''}}">
    <label for="sub_area" class="control-label">{{ 'Sub Area' }}</label>
    <input class="form-control" name="sub_area" type="text" id="sub_area" value="{{ isset($appointment_area->sub_area) ? $appointment_area->sub_area : ''}}" >
    {!! $errors->first('sub_area', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
