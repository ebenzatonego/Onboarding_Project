<div class="form-group {{ $errors->has('type_article') ? 'has-error' : ''}}">
    <label for="type_article" class="control-label">{{ 'Type Article' }}</label>
    <input class="form-control" name="type_article" type="text" id="type_article" value="{{ isset($training_type->type_article) ? $training_type->type_article : ''}}" >
    {!! $errors->first('type_article', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
