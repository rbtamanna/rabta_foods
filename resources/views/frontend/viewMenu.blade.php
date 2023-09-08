@extends('frontend.frontendMaster')
@section('page_css')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr; /* Two equal-width columns */
            gap: 10px; /* Adjust the gap between columns */
            width: 80%; /* Optional: Set a specific width for the grid container */
            margin:  auto; /* Optional: Center the grid container */
        }
    </style>
@endsection
@section('contents')

    <div class="grid-container ">
    
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/product/'.$product->image) }}"  alt="..." height=200px width="300">
                <div class="card-body" style="text-align:center; font-size:2rem">
                    <h3 class="card-title">{{$product->name}}</h3> 
                    <p class="card-text" style="color:red">$ {{$product->price}}</p>
                    <a href="#" class="btn btn-primary"
                    style="background-color: #f28dad; color: white; border-radius: 10px;" 
                    onmouseover="this.style.backgroundColor='gray'" 
                    onmouseout="this.style.backgroundColor='#f28dad'">Add to cart</a>
                </div>
            </div>
        @endforeach
    </div>
    
@section('page_js')
@endsection
@endsection