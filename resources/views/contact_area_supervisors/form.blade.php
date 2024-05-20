<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($contact_area_supervisor->area) ? $contact_area_supervisor->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($contact_area_supervisor->name) ? $contact_area_supervisor->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nickname') ? 'has-error' : ''}}">
    <label for="nickname" class="control-label">{{ 'Nickname' }}</label>
    <input class="form-control" name="nickname" type="text" id="nickname" value="{{ isset($contact_area_supervisor->nickname) ? $contact_area_supervisor->nickname : ''}}" >
    {!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('account') ? 'has-error' : ''}}">
    <label for="account" class="control-label">{{ 'Account' }}</label>
    <input class="form-control" name="account" type="text" id="account" value="{{ isset($contact_area_supervisor->account) ? $contact_area_supervisor->account : ''}}" >
    {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization_name') ? 'has-error' : ''}}">
    <label for="organization_name" class="control-label">{{ 'Organization Name' }}</label>
    <input class="form-control" name="organization_name" type="text" id="organization_name" value="{{ isset($contact_area_supervisor->organization_name) ? $contact_area_supervisor->organization_name : ''}}" >
    {!! $errors->first('organization_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($contact_area_supervisor->phone) ? $contact_area_supervisor->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($contact_area_supervisor->email) ? $contact_area_supervisor->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
