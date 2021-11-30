@extends("layouts.master")
@section("pagecontent")
<div class="container contact">
    <h1>- Kontakt -</h1>
    <div class="contactpage">
        <form class="contactform">
            <div class="form-group">
                <label for="exampleInputEmail1">Emailová adresa</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Čo vás zaujíma?</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Odoslať</button>
        </form>
        <div class="contacts">
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <div class="address">
                    <p>MotylPUB Restaurant</p>
                    <p>Beňadovo 1235</p>
                    <p>029 63 Mútne</p>
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <p>+421 950 643 547</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <p>motylpub@gmail.com</p>
            </div>
        </div>
    </div>
</div>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41514.74702653349!2d19.321320182839905!3d49.43402066297758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4715cba2d344fdef%3A0x400f7d1c69708e0!2s029%2063%20Be%C5%88adovo!5e0!3m2!1ssk!2ssk!4v1634647171458!5m2!1ssk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
@endsection
