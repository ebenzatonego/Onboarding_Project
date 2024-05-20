<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($contact_group_manager->name) ? $contact_group_manager->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nickname') ? 'has-error' : ''}}">
    <label for="nickname" class="control-label">{{ 'Nickname' }}</label>
    <input class="form-control" name="nickname" type="text" id="nickname" value="{{ isset($contact_group_manager->nickname) ? $contact_group_manager->nickname : ''}}" >
    {!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('account') ? 'has-error' : ''}}">
    <label for="account" class="control-label">{{ 'Account' }}</label>
    <input class="form-control" name="account" type="text" id="account" value="{{ isset($contact_group_manager->account) ? $contact_group_manager->account : ''}}" >
    {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization_name') ? 'has-error' : ''}}">
    <label for="organization_name" class="control-label">{{ 'Organization Name' }}</label>
    <input class="form-control" name="organization_name" type="text" id="organization_name" value="{{ isset($contact_group_manager->organization_name) ? $contact_group_manager->organization_name : ''}}" >
    {!! $errors->first('organization_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($contact_group_manager->phone) ? $contact_group_manager->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($contact_group_manager->email) ? $contact_group_manager->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
