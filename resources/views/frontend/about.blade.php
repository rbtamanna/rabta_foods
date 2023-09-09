@extends('frontend.frontendMaster')
@section('page_css')
<style>
    .profile-desc h1{
        text-align: center;
        font-family: 'Satisfy', cursive;
        font-size: 3rem;
    }

    .profile-desc p{
        color: gray;
        margin: auto;
        width: 50%;
        text-align: justify;
        margin-bottom: 10px;
    }
    .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two equal-width columns */
            gap: 10px; /* Adjust the gap between columns */
            width: 100%; /* Optional: Set a specific width for the grid container */
            margin:  auto; /* Optional: Center the grid container */
        }
         /* Define CSS classes for left and right grid items */
    .left {
        grid-column: 2; /* Place on the left side (first column) */
    }
    
    .right {
         /* Place on the right side (second column) */
        grid-column: 1;
    }
</style>
@endsection
@section('contents')
@foreach($about as $abouts)
<br>
    <div class="profile-desc grid-container">
            
                
                    
    <h1> {{$abouts->heading}} </h1><p>{{$abouts->paragraph}}</p><br>
                        
                  
                
            
    </div>
    @endforeach

@endsection