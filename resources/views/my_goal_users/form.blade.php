<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($my_goal_user->user_id) ? $my_goal_user->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('my_goals_type_id') ? 'has-error' : ''}}">
    <label for="my_goals_type_id" class="control-label">{{ 'My Goals Type Id' }}</label>
    <input class="form-control" name="my_goals_type_id" type="text" id="my_goals_type_id" value="{{ isset($my_goal_user->my_goals_type_id) ? $my_goal_user->my_goals_type_id : ''}}" >
    {!! $errors->first('my_goals_type_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_start') ? 'has-error' : ''}}">
    <label for="date_start" class="control-label">{{ 'Date Start' }}</label>
    <input class="form-control" name="date_start" type="date" id="date_start" value="{{ isset($my_goal_user->date_start) ? $my_goal_user->date_start : ''}}" >
    {!! $errors->first('date_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_end') ? 'has-error' : ''}}">
    <label for="date_end" class="control-label">{{ 'Date End' }}</label>
    <input class="form-control" name="date_end" type="date" id="date_end" value="{{ isset($my_goal_user->date_end) ? $my_goal_user->date_end : ''}}" >
    {!! $errors->first('date_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
    <label for="period" class="control-label">{{ 'Period' }}</label>
    <input class="form-control" name="period" type="text" id="period" value="{{ isset($my_goal_user->period) ? $my_goal_user->period : ''}}" >
    {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
