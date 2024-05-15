<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($product->title) ? $product->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($product->detail) ? $product->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo" >{{ isset($product->photo) ? $product->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_type_id') ? 'has-error' : ''}}">
    <label for="product_type_id" class="control-label">{{ 'Product Type Id' }}</label>
    <textarea class="form-control" rows="5" name="product_type_id" type="textarea" id="product_type_id" >{{ isset($product->product_type_id) ? $product->product_type_id : ''}}</textarea>
    {!! $errors->first('product_type_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_like') ? 'has-error' : ''}}">
    <label for="user_like" class="control-label">{{ 'User Like' }}</label>
    <textarea class="form-control" rows="5" name="user_like" type="textarea" id="user_like" >{{ isset($product->user_like) ? $product->user_like : ''}}</textarea>
    {!! $errors->first('user_like', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_dislike') ? 'has-error' : ''}}">
    <label for="user_dislike" class="control-label">{{ 'User Dislike' }}</label>
    <textarea class="form-control" rows="5" name="user_dislike" type="textarea" id="user_dislike" >{{ isset($product->user_dislike) ? $product->user_dislike : ''}}</textarea>
    {!! $errors->first('user_dislike', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_share') ? 'has-error' : ''}}">
    <label for="user_share" class="control-label">{{ 'User Share' }}</label>
    <textarea class="form-control" rows="5" name="user_share" type="textarea" id="user_share" >{{ isset($product->user_share) ? $product->user_share : ''}}</textarea>
    {!! $errors->first('user_share', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_fav') ? 'has-error' : ''}}">
    <label for="user_fav" class="control-label">{{ 'User Fav' }}</label>
    <textarea class="form-control" rows="5" name="user_fav" type="textarea" id="user_fav" >{{ isset($product->user_fav) ? $product->user_fav : ''}}</textarea>
    {!! $errors->first('user_fav', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_view') ? 'has-error' : ''}}">
    <label for="user_view" class="control-label">{{ 'User View' }}</label>
    <textarea class="form-control" rows="5" name="user_view" type="textarea" id="user_view" >{{ isset($product->user_view) ? $product->user_view : ''}}</textarea>
    {!! $errors->first('user_view', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sum_rating') ? 'has-error' : ''}}">
    <label for="sum_rating" class="control-label">{{ 'Sum Rating' }}</label>
    <input class="form-control" name="sum_rating" type="text" id="sum_rating" value="{{ isset($product->sum_rating) ? $product->sum_rating : ''}}" >
    {!! $errors->first('sum_rating', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('log_rating') ? 'has-error' : ''}}">
    <label for="log_rating" class="control-label">{{ 'Log Rating' }}</label>
    <textarea class="form-control" rows="5" name="log_rating" type="textarea" id="log_rating" >{{ isset($product->log_rating) ? $product->log_rating : ''}}</textarea>
    {!! $errors->first('log_rating', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
    <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
    <textarea class="form-control" rows="5" name="pdf_file" type="textarea" id="pdf_file" >{{ isset($product->pdf_file) ? $product->pdf_file : ''}}</textarea>
    {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_download_pdf') ? 'has-error' : ''}}">
    <label for="user_download_pdf" class="control-label">{{ 'User Download Pdf' }}</label>
    <textarea class="form-control" rows="5" name="user_download_pdf" type="textarea" id="user_download_pdf" >{{ isset($product->user_download_pdf) ? $product->user_download_pdf : ''}}</textarea>
    {!! $errors->first('user_download_pdf', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('highlight_number') ? 'has-error' : ''}}">
    <label for="highlight_number" class="control-label">{{ 'Highlight Number' }}</label>
    <input class="form-control" name="highlight_number" type="text" id="highlight_number" value="{{ isset($product->highlight_number) ? $product->highlight_number : ''}}" >
    {!! $errors->first('highlight_number', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
