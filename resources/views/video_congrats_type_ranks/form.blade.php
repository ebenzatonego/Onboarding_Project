<div class="form-group {{ $errors->has('name_rank') ? 'has-error' : ''}}">
    <label for="name_rank" class="control-label">{{ 'Name Rank' }}</label>
    <input class="form-control" name="name_rank" type="text" id="name_rank" value="{{ isset($video_congrats_type_rank->name_rank) ? $video_congrats_type_rank->name_rank : ''}}" >
    {!! $errors->first('name_rank', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('check_active') ? 'has-error' : ''}}">
    <label for="check_active" class="control-label">{{ 'Check Active' }}</label>
    <input class="form-control" name="check_active" type="text" id="check_active" value="{{ isset($video_congrats_type_rank->check_active) ? $video_congrats_type_rank->check_active : ''}}" >
    {!! $errors->first('check_active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
