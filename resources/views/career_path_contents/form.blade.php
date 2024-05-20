<div class="form-group {{ $errors->has('career_path_id') ? 'has-error' : ''}}">
    <label for="career_path_id" class="control-label">{{ 'Career Path Id' }}</label>
    <input class="form-control" name="career_path_id" type="text" id="career_path_id" value="{{ isset($career_path_content->career_path_id) ? $career_path_content->career_path_id : ''}}" >
    {!! $errors->first('career_path_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($career_path_content->title) ? $career_path_content->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Icon' }}</label>
    <textarea class="form-control" rows="5" name="icon" type="textarea" id="icon" >{{ isset($career_path_content->icon) ? $career_path_content->icon : ''}}</textarea>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('read') ? 'has-error' : ''}}">
    <label for="read" class="control-label">{{ 'Read' }}</label>
    <input class="form-control" name="read" type="text" id="read" value="{{ isset($career_path_content->read) ? $career_path_content->read : ''}}" >
    {!! $errors->first('read', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('recommend') ? 'has-error' : ''}}">
    <label for="recommend" class="control-label">{{ 'Recommend' }}</label>
    <input class="form-control" name="recommend" type="text" id="recommend" value="{{ isset($career_path_content->recommend) ? $career_path_content->recommend : ''}}" >
    {!! $errors->first('recommend', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($career_path_content->detail) ? $career_path_content->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
    <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
    <textarea class="form-control" rows="5" name="pdf_file" type="textarea" id="pdf_file" >{{ isset($career_path_content->pdf_file) ? $career_path_content->pdf_file : ''}}</textarea>
    {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo" >{{ isset($career_path_content->photo) ? $career_path_content->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <textarea class="form-control" rows="5" name="video" type="textarea" id="video" >{{ isset($career_path_content->video) ? $career_path_content->video : ''}}</textarea>
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
    <label for="number" class="control-label">{{ 'Number' }}</label>
    <input class="form-control" name="number" type="text" id="number" value="{{ isset($career_path_content->number) ? $career_path_content->number : ''}}" >
    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_download_pdf') ? 'has-error' : ''}}">
    <label for="user_download_pdf" class="control-label">{{ 'User Download Pdf' }}</label>
    <textarea class="form-control" rows="5" name="user_download_pdf" type="textarea" id="user_download_pdf" >{{ isset($career_path_content->user_download_pdf) ? $career_path_content->user_download_pdf : ''}}</textarea>
    {!! $errors->first('user_download_pdf', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_view') ? 'has-error' : ''}}">
    <label for="user_view" class="control-label">{{ 'User View' }}</label>
    <textarea class="form-control" rows="5" name="user_view" type="textarea" id="user_view" >{{ isset($career_path_content->user_view) ? $career_path_content->user_view : ''}}</textarea>
    {!! $errors->first('user_view', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log_video') ? 'has-error' : ''}}">
    <label for="log_video" class="control-label">{{ 'Log Video' }}</label>
    <textarea class="form-control" rows="5" name="log_video" type="textarea" id="log_video" >{{ isset($career_path_content->log_video) ? $career_path_content->log_video : ''}}</textarea>
    {!! $errors->first('log_video', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
