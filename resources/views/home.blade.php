@extends("layouts.master")
@section("pagecontent")
<div class="titleimage">
    <img src="images/burgir.jpg" alt="Hamburger">
</div>
<div class="container onas">
    <h1>O nás</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque faucibus quis neque eget tincidunt. Nunc condimentum, augue vitae dapibus aliquet, ex lectus aliquet odio, id pulvinar mi lectus nec est. In eleifend erat quam, et consequat justo vulputate vitae. In ac elit quis sem molestie malesuada. Vivamus nec suscipit risus. Praesent vel massa sit amet magna suscipit consequat in nec purus. Donec pellentesque elementum diam ac dapibus. Ut dignissim, augue at vehicula tincidunt, urna odio gravida magna, vel ultrices augue nisi nec urna. Donec placerat nisl in risus commodo, non auctor nibh pretium. Sed imperdiet lectus ac turpis rhoncus pharetra quis non tellus. In hac habitasse platea dictumst. Donec sit amet quam pretium, molestie eros quis, lacinia odio. Nam est nisi, porttitor sed mi non, faucibus dignissim ipsum. Pellentesque vitae est malesuada ligula dapibus luctus at non sem. Ut sapien purus, mattis quis turpis ut, tempor sagittis quam.</p>
    <p>Phasellus blandit in elit in varius. Etiam vestibulum eget sapien a sagittis. In scelerisque mattis lorem. Fusce orci erat, congue non augue vitae, suscipit sagittis arcu. Nam est nunc, dictum elementum urna ut, placerat malesuada ante. Nulla imperdiet ullamcorper massa a aliquet. Sed pellentesque id augue et feugiat. Sed in massa euismod, fringilla erat vitae, vehicula nisl. Nulla laoreet laoreet ex.</p>
    <h1 class="mb-5">Hodnotenia zákazníkov</h1>
    @if (empty($reviews))
        <p class="mt-5">Zatiaľ sme nazaznamenali žiadne hodnotenia.</p>
    @else
    <div class="reviews">
        @foreach($reviews as $review)
        @include("items.reviewItem", compact("review"))
        @endforeach
    </div>
    @endif
    @if(Auth::check())
    @if (is_null(Auth::user()->review))
        <form method="post" action="{{ route('review.store') }}" class="reviewForm">
            @csrf
            <div class="form-group">
                <label for="">Zvoľte počet hviezdičiek.</label><br>
                <input type="radio" id="one" name="stars" value="1">
                <label for="one">1</label>
                <input type="radio" id="two" name="stars" value="2">
                <label for="two">2</label>
                <input type="radio" id="three" name="stars" value="3">
                <label for="three">3</label>
                <input type="radio" id="four" name="stars" value="4">
                <label for="four">4</label>
                <input type="radio" id="five" name="stars" value="5" checked>
                <label for="five">5</label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Napíšte nám svoje hodnotenie...</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Odoslať</button>
        </form>
    @endif 
    @endif
</div>
@endsection
