<div class="form-group {{ $errors->has('name_article') ? 'has-error' : ''}}">
    <label for="name_article" class="control-label">{{ 'Name Article' }}</label>
    <input class="form-control" name="name_article" type="text" id="name_article" value="{{ isset($training->name_article) ? $training->name_article : ''}}" >
    {!! $errors->first('name_article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_article') ? 'has-error' : ''}}">
    <label for="type_article" class="control-label">{{ 'Type Article' }}</label>
    <select class="form-control" name="type_article" type="text" id="type_article" value="{{ isset($training->type_article) ? $training->type_article : ''}}">
        <option value="" selected>เลือกประเภท</option>
        <option value="ตารางอบรม">ตารางอบรม</option>
        <option value="ตารางสอบ">ตารางสอบ</option>
    </select>
    {!! $errors->first('type_article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    <label for="start_date" class="control-label">{{ 'Start Date' }}</label>
    <input class="form-control" name="start_date" type="date" id="start_date" value="{{ isset($training->start_date) ? $training->start_date : ''}}" >
    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    <label for="end_date" class="control-label">{{ 'End Date' }}</label>
    <input class="form-control" name="end_date" type="date" id="end_date" value="{{ isset($training->end_date) ? $training->end_date : ''}}" >
    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_time') ? 'has-error' : ''}}">
    <label for="start_time" class="control-label">{{ 'Start Time' }}</label>
    <input class="form-control" name="start_time" type="time" id="start_time" value="{{ isset($training->start_time) ? $training->start_time : ''}}" >
    {!! $errors->first('start_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_time') ? 'has-error' : ''}}">
    <label for="end_time" class="control-label">{{ 'End Time' }}</label>
    <input class="form-control" name="end_time" type="time" id="end_time" value="{{ isset($training->end_time) ? $training->end_time : ''}}" >
    {!! $errors->first('end_time', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group {{ $errors->has('check_all_day_start') ? 'has-error' : ''}}">
    <label for="check_all_day_start" class="control-label">{{ 'Check All Day Start' }}</label>
    <input class="form-control" name="check_all_day_start" type="text" id="check_all_day_start" value="{{ isset($training->check_all_day_start) ? $training->check_all_day_start : ''}}" >
    {!! $errors->first('check_all_day_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('check_all_day_end') ? 'has-error' : ''}}">
    <label for="check_all_day_end" class="control-label">{{ 'Check All Day End' }}</label>
    <input class="form-control" name="check_all_day_end" type="text" id="check_all_day_end" value="{{ isset($training->check_all_day_end) ? $training->check_all_day_end : ''}}" >
    {!! $errors->first('check_all_day_end', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($training->detail) ? $training->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_lms') ? 'has-error' : ''}}">
    <label for="link_lms" class="control-label">{{ 'Link Lms' }}</label>
    <textarea class="form-control" rows="5" name="link_lms" type="textarea" id="link_lms" >{{ isset($training->link_lms) ? $training->link_lms : ''}}</textarea>
    {!! $errors->first('link_lms', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
