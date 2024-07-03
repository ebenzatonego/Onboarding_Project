<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div>
                <i class="fa-solid fa-address-book me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Add Tools Contacts</h5>
        </div>
        <hr>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($tools_contact->phone) ? $tools_contact->phone : ''}}">
            </div>
            <div class="col-md-6">
                <label for="mail" class="form-label">Email</label>
                <input class="form-control" name="mail" type="text" id="mail" value="{{ isset($tools_contact->mail) ? $tools_contact->mail : ''}}">
            </div>
            <div class="col-md-12">
                <label for="mail" class="form-label">หัวข้อ</label>
                <input class="form-control" list="list_type" id="type" onchange="check_data_for_submit();" name="type">
                <datalist id="list_type">
                    @foreach($data_type as $item)
                    <option data-value="{{$item->type}}">{{$item->type}}</option>
                    @endforeach
                </datalist>
            </div>

            <div class="col-12 d-flex justify-content-between">
                <a href="{{ url('/tools_contacts') }}" type="button" class="btn btn-warning btn-sm d-flex align-items-center" title="Back">
                 <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                </a>
                
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                </div>
            </div>
        </div>
    </div>
</div>
