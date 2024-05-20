<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($content_popup->title) ? $content_popup->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($content_popup->detail) ? $content_popup->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo" >{{ isset($content_popup->photo) ? $content_popup->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <textarea class="form-control" rows="5" name="video" type="textarea" id="video" >{{ isset($content_popup->video) ? $content_popup->video : ''}}</textarea>
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($content_popup->user_id) ? $content_popup->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($content_popup->status) ? $content_popup->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log_video') ? 'has-error' : ''}}">
    <label for="log_video" class="control-label">{{ 'Log Video' }}</label>
    <textarea class="form-control" rows="5" name="log_video" type="textarea" id="log_video" >{{ isset($content_popup->log_video) ? $content_popup->log_video : ''}}</textarea>
    {!! $errors->first('log_video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_view') ? 'has-error' : ''}}">
    <label for="user_view" class="control-label">{{ 'User View' }}</label>
    <textarea class="form-control" rows="5" name="user_view" type="textarea" id="user_view" >{{ isset($content_popup->user_view) ? $content_popup->user_view : ''}}</textarea>
    {!! $errors->first('user_view', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
