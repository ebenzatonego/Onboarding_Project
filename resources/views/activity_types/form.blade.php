<div class="form-group {{ $errors->has('name_type') ? 'has-error' : ''}}">
    <label for="name_type" class="control-label">{{ 'Name Type' }}</label>
    <input class="form-control" name="name_type" type="text" id="name_type" value="{{ isset($activity_type->name_type) ? $activity_type->name_type : ''}}" >
    {!! $errors->first('name_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_menu') ? 'has-error' : ''}}">
    <label for="number_menu" class="control-label">{{ 'Number Menu' }}</label>
    <input class="form-control" name="number_menu" type="text" id="number_menu" value="{{ isset($activity_type->number_menu) ? $activity_type->number_menu : ''}}" >
    {!! $errors->first('number_menu', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('check_highlight') ? 'has-error' : ''}}">
    <label for="check_highlight" class="control-label">{{ 'Check Highlight' }}</label>
    <input class="form-control" name="check_highlight" type="text" id="check_highlight" value="{{ isset($activity_type->check_highlight) ? $activity_type->check_highlight : ''}}" >
    {!! $errors->first('check_highlight', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
