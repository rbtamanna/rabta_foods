@extends('frontend.frontendMaster')
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Edit Contact
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
            <form action="{{ url('contact/update/'.$contact->id) }}" role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="control-label">Media</label>
                    <input type="text" class="form-control" name="media" id="media" value="{{ $contact->media }}" data-validate="required" data-message-required="Media is a required field." placeholder="Required Field" />
                    @error('field1')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label class="control-label">URL</label>
                    <input type="url" class="form-control" name="url" id="url" value="{{ $contact->url }}"  data-message-required="This is custom message for required field." placeholder="Required Field" />
                    
                    <label class="control-label">Value</label>
                    <input type="text" class="form-control" name="value" id="value" value="{{ $contact->value }}"  data-message-required="This is custom message for required field." placeholder="Required Field" />
               
                </div>
                <div class="form-group">
                    <button type="submit" id="submidt_btn" class="btn btn-success custom_c">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('backend/js/jquery-validate/jquery.validate.min.js') }}"></script>
    
@endsection