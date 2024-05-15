<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($calendar->title) ? $calendar->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <textarea class="form-control" rows="5" name="type" type="textarea" id="type" >{{ isset($calendar->type) ? $calendar->type : ''}}</textarea>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($calendar->user_id) ? $calendar->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('all_day') ? 'has-error' : ''}}">
    <label for="all_day" class="control-label">{{ 'All Day' }}</label>
    <input class="form-control" name="all_day" type="text" id="all_day" value="{{ isset($calendar->all_day) ? $calendar->all_day : ''}}" >
    {!! $errors->first('all_day', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_start') ? 'has-error' : ''}}">
    <label for="date_start" class="control-label">{{ 'Date Start' }}</label>
    <input class="form-control" name="date_start" type="date" id="date_start" value="{{ isset($calendar->date_start) ? $calendar->date_start : ''}}" >
    {!! $errors->first('date_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_end') ? 'has-error' : ''}}">
    <label for="date_end" class="control-label">{{ 'Date End' }}</label>
    <input class="form-control" name="date_end" type="date" id="date_end" value="{{ isset($calendar->date_end) ? $calendar->date_end : ''}}" >
    {!! $errors->first('date_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_start') ? 'has-error' : ''}}">
    <label for="time_start" class="control-label">{{ 'Time Start' }}</label>
    <input class="form-control" name="time_start" type="time" id="time_start" value="{{ isset($calendar->time_start) ? $calendar->time_start : ''}}" >
    {!! $errors->first('time_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_end') ? 'has-error' : ''}}">
    <label for="time_end" class="control-label">{{ 'Time End' }}</label>
    <input class="form-control" name="time_end" type="time" id="time_end" value="{{ isset($calendar->time_end) ? $calendar->time_end : ''}}" >
    {!! $errors->first('time_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('training_id') ? 'has-error' : ''}}">
    <label for="training_id" class="control-label">{{ 'Training Id' }}</label>
    <input class="form-control" name="training_id" type="text" id="training_id" value="{{ isset($calendar->training_id) ? $calendar->training_id : ''}}" >
    {!! $errors->first('training_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('appointment_id') ? 'has-error' : ''}}">
    <label for="appointment_id" class="control-label">{{ 'Appointment Id' }}</label>
    <input class="form-control" name="appointment_id" type="text" id="appointment_id" value="{{ isset($calendar->appointment_id) ? $calendar->appointment_id : ''}}" >
    {!! $errors->first('appointment_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activity_id') ? 'has-error' : ''}}">
    <label for="activity_id" class="control-label">{{ 'Activity Id' }}</label>
    <input class="form-control" name="activity_id" type="text" id="activity_id" value="{{ isset($calendar->activity_id) ? $calendar->activity_id : ''}}" >
    {!! $errors->first('activity_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
