<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($appointment->title) ? $appointment->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($appointment->detail) ? $appointment->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo" >{{ isset($appointment->photo) ? $appointment->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($appointment->type) ? $appointment->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('training_type_id') ? 'has-error' : ''}}">
    <label for="training_type_id" class="control-label">{{ 'Training Type Id' }}</label>
    <textarea class="form-control" rows="5" name="training_type_id" type="textarea" id="training_type_id" >{{ isset($appointment->training_type_id) ? $appointment->training_type_id : ''}}</textarea>
    {!! $errors->first('training_type_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('all_day') ? 'has-error' : ''}}">
    <label for="all_day" class="control-label">{{ 'All Day' }}</label>
    <input class="form-control" name="all_day" type="text" id="all_day" value="{{ isset($appointment->all_day) ? $appointment->all_day : ''}}" >
    {!! $errors->first('all_day', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_start') ? 'has-error' : ''}}">
    <label for="date_start" class="control-label">{{ 'Date Start' }}</label>
    <input class="form-control" name="date_start" type="date" id="date_start" value="{{ isset($appointment->date_start) ? $appointment->date_start : ''}}" >
    {!! $errors->first('date_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_end') ? 'has-error' : ''}}">
    <label for="date_end" class="control-label">{{ 'Date End' }}</label>
    <input class="form-control" name="date_end" type="date" id="date_end" value="{{ isset($appointment->date_end) ? $appointment->date_end : ''}}" >
    {!! $errors->first('date_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_start') ? 'has-error' : ''}}">
    <label for="time_start" class="control-label">{{ 'Time Start' }}</label>
    <input class="form-control" name="time_start" type="time" id="time_start" value="{{ isset($appointment->time_start) ? $appointment->time_start : ''}}" >
    {!! $errors->first('time_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_end') ? 'has-error' : ''}}">
    <label for="time_end" class="control-label">{{ 'Time End' }}</label>
    <input class="form-control" name="time_end" type="time" id="time_end" value="{{ isset($appointment->time_end) ? $appointment->time_end : ''}}" >
    {!! $errors->first('time_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_like') ? 'has-error' : ''}}">
    <label for="user_like" class="control-label">{{ 'User Like' }}</label>
    <textarea class="form-control" rows="5" name="user_like" type="textarea" id="user_like" >{{ isset($appointment->user_like) ? $appointment->user_like : ''}}</textarea>
    {!! $errors->first('user_like', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_dislike') ? 'has-error' : ''}}">
    <label for="user_dislike" class="control-label">{{ 'User Dislike' }}</label>
    <textarea class="form-control" rows="5" name="user_dislike" type="textarea" id="user_dislike" >{{ isset($appointment->user_dislike) ? $appointment->user_dislike : ''}}</textarea>
    {!! $errors->first('user_dislike', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_share') ? 'has-error' : ''}}">
    <label for="user_share" class="control-label">{{ 'User Share' }}</label>
    <textarea class="form-control" rows="5" name="user_share" type="textarea" id="user_share" >{{ isset($appointment->user_share) ? $appointment->user_share : ''}}</textarea>
    {!! $errors->first('user_share', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_fav') ? 'has-error' : ''}}">
    <label for="user_fav" class="control-label">{{ 'User Fav' }}</label>
    <textarea class="form-control" rows="5" name="user_fav" type="textarea" id="user_fav" >{{ isset($appointment->user_fav) ? $appointment->user_fav : ''}}</textarea>
    {!! $errors->first('user_fav', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_detail') ? 'has-error' : ''}}">
    <label for="location_detail" class="control-label">{{ 'Location Detail' }}</label>
    <textarea class="form-control" rows="5" name="location_detail" type="textarea" id="location_detail" >{{ isset($appointment->location_detail) ? $appointment->location_detail : ''}}</textarea>
    {!! $errors->first('location_detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_map') ? 'has-error' : ''}}">
    <label for="link_map" class="control-label">{{ 'Link Map' }}</label>
    <textarea class="form-control" rows="5" name="link_map" type="textarea" id="link_map" >{{ isset($appointment->link_map) ? $appointment->link_map : ''}}</textarea>
    {!! $errors->first('link_map', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_out') ? 'has-error' : ''}}">
    <label for="link_out" class="control-label">{{ 'Link Out' }}</label>
    <textarea class="form-control" rows="5" name="link_out" type="textarea" id="link_out" >{{ isset($appointment->link_out) ? $appointment->link_out : ''}}</textarea>
    {!! $errors->first('link_out', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('click_link_out') ? 'has-error' : ''}}">
    <label for="click_link_out" class="control-label">{{ 'Click Link Out' }}</label>
    <textarea class="form-control" rows="5" name="click_link_out" type="textarea" id="click_link_out" >{{ isset($appointment->click_link_out) ? $appointment->click_link_out : ''}}</textarea>
    {!! $errors->first('click_link_out', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
