<div class="form-group {{ $errors->has('news_id') ? 'has-error' : ''}}">
    <label for="news_id" class="control-label">{{ 'News Id' }}</label>
    <input class="form-control" name="news_id" type="text" id="news_id" value="{{ isset($log_video_news->news_id) ? $log_video_news->news_id : ''}}" >
    {!! $errors->first('news_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($log_video_news->user_id) ? $log_video_news->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log') ? 'has-error' : ''}}">
    <label for="log" class="control-label">{{ 'Log' }}</label>
    <textarea class="form-control" rows="5" name="log" type="textarea" id="log" >{{ isset($log_video_news->log) ? $log_video_news->log : ''}}</textarea>
    {!! $errors->first('log', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
