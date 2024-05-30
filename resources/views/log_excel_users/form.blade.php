<div class="form-group {{ $errors->has('name_file') ? 'has-error' : ''}}">
    <label for="name_file" class="control-label">{{ 'Name File' }}</label>
    <textarea class="form-control" rows="5" name="name_file" type="textarea" id="name_file" >{{ isset($log_excel_user->name_file) ? $log_excel_user->name_file : ''}}</textarea>
    {!! $errors->first('name_file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_file') ? 'has-error' : ''}}">
    <label for="link_file" class="control-label">{{ 'Link File' }}</label>
    <textarea class="form-control" rows="5" name="link_file" type="textarea" id="link_file" >{{ isset($log_excel_user->link_file) ? $log_excel_user->link_file : ''}}</textarea>
    {!! $errors->first('link_file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($log_excel_user->user_id) ? $log_excel_user->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
