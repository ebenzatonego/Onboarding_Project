<div class="form-group {{ $errors->has('training_id') ? 'has-error' : ''}}">
    <label for="training_id" class="control-label">{{ 'Training Id' }}</label>
    <input class="form-control" name="training_id" type="text" id="training_id" value="{{ isset($log_video_training->training_id) ? $log_video_training->training_id : ''}}" >
    {!! $errors->first('training_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($log_video_training->user_id) ? $log_video_training->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log') ? 'has-error' : ''}}">
    <label for="log" class="control-label">{{ 'Log' }}</label>
    <textarea class="form-control" rows="5" name="log" type="textarea" id="log" >{{ isset($log_video_training->log) ? $log_video_training->log : ''}}</textarea>
    {!! $errors->first('log', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
