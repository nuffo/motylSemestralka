@extends("layouts.master")
@section("pagecontent")
@if(Auth::check())
    @if(Auth::user()->role === 'admin')
    <div class="container text-center">
        
        <h1 class="mb-5">- Otázky používateľov -</h1>
        @foreach($questions as $question)
            @include("items.questionItem", compact("question"))
        @endforeach
        
    </div>
    @endif
    @endif
@endsection
