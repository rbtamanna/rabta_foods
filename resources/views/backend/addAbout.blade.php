@extends('layouts.master')
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Add About
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
            <form action="{{ url('addAbout') }}" role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label" >Heading</label>
                    <input type="text" class="form-control" name="heading" id="heading" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                    <label class="control-label" for="url">Paragraph</label>
                    <input type="text" class="form-control" name="paragraph" id="paragraph"  data-message-required="This is custom message for required field." placeholder="Required Field" />
                    <label class="control-label" for="value">Preference</label>
                    <input type="text" class="form-control" name="preference" id="preference"  data-message-required="This is custom message for required field." placeholder="Required Field" />
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