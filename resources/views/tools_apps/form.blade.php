<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($tools_app->name) ? $tools_app->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($tools_app->type) ? $tools_app->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_icon') ? 'has-error' : ''}}">
    <label for="photo_icon" class="control-label">{{ 'Photo Icon' }}</label>
    <textarea class="form-control" rows="5" name="photo_icon" type="textarea" id="photo_icon" >{{ isset($tools_app->photo_icon) ? $tools_app->photo_icon : ''}}</textarea>
    {!! $errors->first('photo_icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_ios') ? 'has-error' : ''}}">
    <label for="link_ios" class="control-label">{{ 'Link Ios' }}</label>
    <textarea class="form-control" rows="5" name="link_ios" type="textarea" id="link_ios" >{{ isset($tools_app->link_ios) ? $tools_app->link_ios : ''}}</textarea>
    {!! $errors->first('link_ios', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('click_link_ios') ? 'has-error' : ''}}">
    <label for="click_link_ios" class="control-label">{{ 'Click Link Ios' }}</label>
    <textarea class="form-control" rows="5" name="click_link_ios" type="textarea" id="click_link_ios" >{{ isset($tools_app->click_link_ios) ? $tools_app->click_link_ios : ''}}</textarea>
    {!! $errors->first('click_link_ios', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_android') ? 'has-error' : ''}}">
    <label for="link_android" class="control-label">{{ 'Link Android' }}</label>
    <textarea class="form-control" rows="5" name="link_android" type="textarea" id="link_android" >{{ isset($tools_app->link_android) ? $tools_app->link_android : ''}}</textarea>
    {!! $errors->first('link_android', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('click_link_android') ? 'has-error' : ''}}">
    <label for="click_link_android" class="control-label">{{ 'Click Link Android' }}</label>
    <textarea class="form-control" rows="5" name="click_link_android" type="textarea" id="click_link_android" >{{ isset($tools_app->click_link_android) ? $tools_app->click_link_android : ''}}</textarea>
    {!! $errors->first('click_link_android', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
