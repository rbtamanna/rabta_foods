@extends('frontend.frontendMaster')
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Register
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
            <form action="{{ url('registration') }}" role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">Name</label>

                    <input type="text" class="form-control" name="name" id="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                </div>

                <div class="form-group">
                    <label class="control-label">Email</label>

                    <input type="email" class="form-control" name="email" id="email" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                    <span id="email_err"></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Phone</label>

                    <input type="text" class="form-control" name="phone" id="phone" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>

                    <input type="text" class="form-control" name="address" id="address" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>

                    <input type="password" class="form-control" name="password" id="password" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
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