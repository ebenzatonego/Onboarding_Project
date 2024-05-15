<div class="form-group {{ $errors->has('tools_tutorial_id') ? 'has-error' : ''}}">
    <label for="tools_tutorial_id" class="control-label">{{ 'Tools Tutorial Id' }}</label>
    <input class="form-control" name="tools_tutorial_id" type="text" id="tools_tutorial_id" value="{{ isset($log_video_tools_tutorial->tools_tutorial_id) ? $log_video_tools_tutorial->tools_tutorial_id : ''}}" >
    {!! $errors->first('tools_tutorial_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($log_video_tools_tutorial->user_id) ? $log_video_tools_tutorial->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log') ? 'has-error' : ''}}">
    <label for="log" class="control-label">{{ 'Log' }}</label>
    <textarea class="form-control" rows="5" name="log" type="textarea" id="log" >{{ isset($log_video_tools_tutorial->log) ? $log_video_tools_tutorial->log : ''}}</textarea>
    {!! $errors->first('log', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
