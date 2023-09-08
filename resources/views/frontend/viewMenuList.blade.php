@extends('frontend.frontendMaster')
@section('page_css')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two equal-width columns */
            gap: 10px; /* Adjust the gap between columns */
            width: 80%; /* Optional: Set a specific width for the grid container */
            margin:  auto; /* Optional: Center the grid container */
            
        }
    </style>
@endsection
@section('contents')
    <div class="grid-container">
        @foreach($category as $categories)
            <h2 ><a style="color: #2c2e2f" href="{{url('menu/category/'.$categories->id)}}" target="_blank">{{$categories->name}}</a></h2>
        @endforeach
    </div>
    
@section('page_js')
@endsection
@endsection