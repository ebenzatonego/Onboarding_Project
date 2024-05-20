<div class="form-group {{ $errors->has('name_rank') ? 'has-error' : ''}}">
    <label for="name_rank" class="control-label">{{ 'Name Rank' }}</label>
    <input class="form-control" name="name_rank" type="text" id="name_rank" value="{{ isset($career_path->name_rank) ? $career_path->name_rank : ''}}" >
    {!! $errors->first('name_rank', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_story') ? 'has-error' : ''}}">
    <label for="number_story" class="control-label">{{ 'Number Story' }}</label>
    <input class="form-control" name="number_story" type="text" id="number_story" value="{{ isset($career_path->number_story) ? $career_path->number_story : ''}}" >
    {!! $errors->first('number_story', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title_story') ? 'has-error' : ''}}">
    <label for="title_story" class="control-label">{{ 'Title Story' }}</label>
    <input class="form-control" name="title_story" type="text" id="title_story" value="{{ isset($career_path->title_story) ? $career_path->title_story : ''}}" >
    {!! $errors->first('title_story', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_story') ? 'has-error' : ''}}">
    <label for="description_story" class="control-label">{{ 'Description Story' }}</label>
    <textarea class="form-control" rows="5" name="description_story" type="textarea" id="description_story" >{{ isset($career_path->description_story) ? $career_path->description_story : ''}}</textarea>
    {!! $errors->first('description_story', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_story') ? 'has-error' : ''}}">
    <label for="photo_story" class="control-label">{{ 'Photo Story' }}</label>
    <textarea class="form-control" rows="5" name="photo_story" type="textarea" id="photo_story" >{{ isset($career_path->photo_story) ? $career_path->photo_story : ''}}</textarea>
    {!! $errors->first('photo_story', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_view') ? 'has-error' : ''}}">
    <label for="user_view" class="control-label">{{ 'User View' }}</label>
    <textarea class="form-control" rows="5" name="user_view" type="textarea" id="user_view" >{{ isset($career_path->user_view) ? $career_path->user_view : ''}}</textarea>
    {!! $errors->first('user_view', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
