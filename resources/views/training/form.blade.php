<div class="form-group {{ $errors->has('name_article') ? 'has-error' : ''}}">
    <label for="name_article" class="control-label">{{ 'Name Article' }}</label>
    <input class="form-control" name="name_article" type="text" id="name_article" value="{{ isset($training->name_article) ? $training->name_article : ''}}" >
    {!! $errors->first('name_article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_article') ? 'has-error' : ''}}">
    <label for="type_article" class="control-label">{{ 'Type Article' }}</label>
    <select class="form-control" name="type_article" type="text" id="type_article" value="{{ isset($training->type_article) ? $training->type_article : ''}}">
        <option>เลือกประเภท</option>
        @foreach($type_article as $item)
            <option value="{{ $item->type_article }}">{{ $item->type_article }}</option>
        @endforeach
    </select>
    {!! $errors->first('type_article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($training->detail) ? $training->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($training->photo) ? $training->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_video') ? 'has-error' : ''}}">
    <label for="link_video" class="control-label">{{ 'Link Video' }}</label>
    <textarea class="form-control" rows="5" name="link_video" type="textarea" id="link_video" >{{ isset($training->link_video) ? $training->link_video : ''}}</textarea>
    {!! $errors->first('link_video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_lms') ? 'has-error' : ''}}">
    <label for="link_lms" class="control-label">{{ 'Link Lms' }}</label>
    <textarea class="form-control" rows="5" name="link_lms" type="textarea" id="link_lms" >{{ isset($training->link_lms) ? $training->link_lms : ''}}</textarea>
    {!! $errors->first('link_lms', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
