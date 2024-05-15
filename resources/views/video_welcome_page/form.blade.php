<div class="form-group {{ $errors->has('name_video') ? 'has-error' : ''}}">
    <label for="name_video" class="control-label">{{ 'Name Video' }}</label>
    <input class="form-control" name="name_video" type="text" id="name_video" value="{{ isset($video_welcome_page->name_video) ? $video_welcome_page->name_video : ''}}" >
    {!! $errors->first('name_video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($video_welcome_page->type) ? $video_welcome_page->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($video_welcome_page->user_id) ? $video_welcome_page->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($video_welcome_page->status) ? $video_welcome_page->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log') ? 'has-error' : ''}}">
    <label for="log" class="control-label">{{ 'Log' }}</label>
    <textarea class="form-control" rows="5" name="log" type="textarea" id="log" >{{ isset($video_welcome_page->log) ? $video_welcome_page->log : ''}}</textarea>
    {!! $errors->first('log', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
