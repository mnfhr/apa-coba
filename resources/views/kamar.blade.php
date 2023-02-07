@extends('layouts.main')

@section('container')

<div class="hero-wrap" style="background-image: url('/images/bg_3.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a
                                href="/tipeKamar">Rooms</a></span> <span>Rooms Single</span></p>
                    <h1 class="mb-4 bread">Rooms Details</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @if (session()->has('penuh'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show col-lg-6" role="alert">
                    {{ session('penuh') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            <div class="col-md-12 ftco-animate">
                @if ($tipe_kamar->img)
                <div class="room-img" style="background-image: url({{ asset('storage/' . $tipe_kamar->img) }});"></div>
                @else
                <div class="single-slider owl-carousel">
                    <div class="item">
                        <div class="room-img" style="background-image: url(/images/room-4.jpg);"></div>
                    </div>
                    <div class="item">
                        <div class="room-img" style="background-image: url(/images/room-5.jpg);"></div>
                    </div>
                    <div class="item">
                        <div class="room-img" style="background-image: url(/images/room-6.jpg);"></div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                <h2 class="mb-4">{{ $tipe_kamar->nama }} <span>- ({{ $tipe_kamar->stok }} Available rooms)</span></h2>
                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the
                    skyline of her
                    hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road,
                    the Line Lane.
                    Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                <div class="d-md-flex mt-5 mb-5">
                    <ul class="list">
                        <li><span>Max:</span> 3 Persons</li>
                        <li><span>Size:</span> 45 m2</li>
                    </ul>
                    <ul class="list ml-md-5">
                        <li><span>View:</span> Sea View</li>
                        <li><span>AC:</span> 1</li>
                    </ul>
                </div>
                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the
                    skyline of her
                    hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road,
                    the Line Lane.
                    Pityful a rethoric question ran over her cheek, then she continued her way.</p>
            </div>
            <div class="col-md-4 properties-single ftco-animate mb-5 mt-4 pl-md-5">
                <h4 class="mb-4">Room Facilities</h4>
                    <ul class="list">
                            @foreach ($tipe_kamar->fasilitasKamars as $fkamar)
                            <li class="text-primary">{{ $fkamar->nama }}</li>
                            @endforeach
                    </ul>
                 </div>
            </div>
            <div class="col-md-12">
                <div class="row m-0 p-md-3 rounded-lg" style="border: 2px dashed #21CC7A">
                    <div class="col-md-10">
                        <h3 class="m-0 pt-2 text-bold">@rupiah($tipe_kamar->harga) per night</h3>
                    </div>
                    <div class="col-md-2 p-0 text-center ">
                        <a href="/booking/{{ $tipe_kamar->id }}" class="btn btn-primary rounded-lg px-4 py-3">Booking
                            now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>

<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/jquery.animateNumber.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/js/google-map.js"></script>
<script src="/js/main.js"></script>
@endsection
