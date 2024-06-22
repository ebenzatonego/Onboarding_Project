<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($log_delete_content->type) ? $log_delete_content->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($log_delete_content->user_id) ? $log_delete_content->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('news_name') ? 'has-error' : ''}}">
    <label for="news_name" class="control-label">{{ 'News Name' }}</label>
    <input class="form-control" name="news_name" type="text" id="news_name" value="{{ isset($log_delete_content->news_name) ? $log_delete_content->news_name : ''}}" >
    {!! $errors->first('news_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('training_name') ? 'has-error' : ''}}">
    <label for="training_name" class="control-label">{{ 'Training Name' }}</label>
    <input class="form-control" name="training_name" type="text" id="training_name" value="{{ isset($log_delete_content->training_name) ? $log_delete_content->training_name : ''}}" >
    {!! $errors->first('training_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
    <label for="product_name" class="control-label">{{ 'Product Name' }}</label>
    <input class="form-control" name="product_name" type="text" id="product_name" value="{{ isset($log_delete_content->product_name) ? $log_delete_content->product_name : ''}}" >
    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('appointment_name') ? 'has-error' : ''}}">
    <label for="appointment_name" class="control-label">{{ 'Appointment Name' }}</label>
    <input class="form-control" name="appointment_name" type="text" id="appointment_name" value="{{ isset($log_delete_content->appointment_name) ? $log_delete_content->appointment_name : ''}}" >
    {!! $errors->first('appointment_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activity_name') ? 'has-error' : ''}}">
    <label for="activity_name" class="control-label">{{ 'Activity Name' }}</label>
    <input class="form-control" name="activity_name" type="text" id="activity_name" value="{{ isset($log_delete_content->activity_name) ? $log_delete_content->activity_name : ''}}" >
    {!! $errors->first('activity_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
