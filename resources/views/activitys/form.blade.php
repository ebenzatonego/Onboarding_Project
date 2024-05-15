<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($activity->title) ? $activity->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($activity->detail) ? $activity->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo" >{{ isset($activity->photo) ? $activity->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activity_type_id') ? 'has-error' : ''}}">
    <label for="activity_type_id" class="control-label">{{ 'Activity Type Id' }}</label>
    <textarea class="form-control" rows="5" name="activity_type_id" type="textarea" id="activity_type_id" >{{ isset($activity->activity_type_id) ? $activity->activity_type_id : ''}}</textarea>
    {!! $errors->first('activity_type_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('all_day') ? 'has-error' : ''}}">
    <label for="all_day" class="control-label">{{ 'All Day' }}</label>
    <input class="form-control" name="all_day" type="text" id="all_day" value="{{ isset($activity->all_day) ? $activity->all_day : ''}}" >
    {!! $errors->first('all_day', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_start') ? 'has-error' : ''}}">
    <label for="date_start" class="control-label">{{ 'Date Start' }}</label>
    <input class="form-control" name="date_start" type="date" id="date_start" value="{{ isset($activity->date_start) ? $activity->date_start : ''}}" >
    {!! $errors->first('date_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_end') ? 'has-error' : ''}}">
    <label for="date_end" class="control-label">{{ 'Date End' }}</label>
    <input class="form-control" name="date_end" type="date" id="date_end" value="{{ isset($activity->date_end) ? $activity->date_end : ''}}" >
    {!! $errors->first('date_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_start') ? 'has-error' : ''}}">
    <label for="time_start" class="control-label">{{ 'Time Start' }}</label>
    <input class="form-control" name="time_start" type="time" id="time_start" value="{{ isset($activity->time_start) ? $activity->time_start : ''}}" >
    {!! $errors->first('time_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_end') ? 'has-error' : ''}}">
    <label for="time_end" class="control-label">{{ 'Time End' }}</label>
    <input class="form-control" name="time_end" type="time" id="time_end" value="{{ isset($activity->time_end) ? $activity->time_end : ''}}" >
    {!! $errors->first('time_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_detail') ? 'has-error' : ''}}">
    <label for="location_detail" class="control-label">{{ 'Location Detail' }}</label>
    <textarea class="form-control" rows="5" name="location_detail" type="textarea" id="location_detail" >{{ isset($activity->location_detail) ? $activity->location_detail : ''}}</textarea>
    {!! $errors->first('location_detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_map') ? 'has-error' : ''}}">
    <label for="link_map" class="control-label">{{ 'Link Map' }}</label>
    <textarea class="form-control" rows="5" name="link_map" type="textarea" id="link_map" >{{ isset($activity->link_map) ? $activity->link_map : ''}}</textarea>
    {!! $errors->first('link_map', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_like') ? 'has-error' : ''}}">
    <label for="user_like" class="control-label">{{ 'User Like' }}</label>
    <textarea class="form-control" rows="5" name="user_like" type="textarea" id="user_like" >{{ isset($activity->user_like) ? $activity->user_like : ''}}</textarea>
    {!! $errors->first('user_like', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_dislike') ? 'has-error' : ''}}">
    <label for="user_dislike" class="control-label">{{ 'User Dislike' }}</label>
    <textarea class="form-control" rows="5" name="user_dislike" type="textarea" id="user_dislike" >{{ isset($activity->user_dislike) ? $activity->user_dislike : ''}}</textarea>
    {!! $errors->first('user_dislike', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_share') ? 'has-error' : ''}}">
    <label for="user_share" class="control-label">{{ 'User Share' }}</label>
    <textarea class="form-control" rows="5" name="user_share" type="textarea" id="user_share" >{{ isset($activity->user_share) ? $activity->user_share : ''}}</textarea>
    {!! $errors->first('user_share', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_fav') ? 'has-error' : ''}}">
    <label for="user_fav" class="control-label">{{ 'User Fav' }}</label>
    <textarea class="form-control" rows="5" name="user_fav" type="textarea" id="user_fav" >{{ isset($activity->user_fav) ? $activity->user_fav : ''}}</textarea>
    {!! $errors->first('user_fav', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_view') ? 'has-error' : ''}}">
    <label for="user_view" class="control-label">{{ 'User View' }}</label>
    <textarea class="form-control" rows="5" name="user_view" type="textarea" id="user_view" >{{ isset($activity->user_view) ? $activity->user_view : ''}}</textarea>
    {!! $errors->first('user_view', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sum_rating') ? 'has-error' : ''}}">
    <label for="sum_rating" class="control-label">{{ 'Sum Rating' }}</label>
    <input class="form-control" name="sum_rating" type="text" id="sum_rating" value="{{ isset($activity->sum_rating) ? $activity->sum_rating : ''}}" >
    {!! $errors->first('sum_rating', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log_rating') ? 'has-error' : ''}}">
    <label for="log_rating" class="control-label">{{ 'Log Rating' }}</label>
    <textarea class="form-control" rows="5" name="log_rating" type="textarea" id="log_rating" >{{ isset($activity->log_rating) ? $activity->log_rating : ''}}</textarea>
    {!! $errors->first('log_rating', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('highlight_number') ? 'has-error' : ''}}">
    <label for="highlight_number" class="control-label">{{ 'Highlight Number' }}</label>
    <input class="form-control" name="highlight_number" type="text" id="highlight_number" value="{{ isset($activity->highlight_number) ? $activity->highlight_number : ''}}" >
    {!! $errors->first('highlight_number', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
