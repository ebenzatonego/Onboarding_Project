<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($favorite->type) ? $favorite->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($favorite->user_id) ? $favorite->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($favorite->status) ? $favorite->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('news_id') ? 'has-error' : ''}}">
    <label for="news_id" class="control-label">{{ 'News Id' }}</label>
    <input class="form-control" name="news_id" type="text" id="news_id" value="{{ isset($favorite->news_id) ? $favorite->news_id : ''}}" >
    {!! $errors->first('news_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('training_id') ? 'has-error' : ''}}">
    <label for="training_id" class="control-label">{{ 'Training Id' }}</label>
    <input class="form-control" name="training_id" type="text" id="training_id" value="{{ isset($favorite->training_id) ? $favorite->training_id : ''}}" >
    {!! $errors->first('training_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <input class="form-control" name="product_id" type="text" id="product_id" value="{{ isset($favorite->product_id) ? $favorite->product_id : ''}}" >
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('appointment_id') ? 'has-error' : ''}}">
    <label for="appointment_id" class="control-label">{{ 'Appointment Id' }}</label>
    <input class="form-control" name="appointment_id" type="text" id="appointment_id" value="{{ isset($favorite->appointment_id) ? $favorite->appointment_id : ''}}" >
    {!! $errors->first('appointment_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
