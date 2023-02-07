@extends('layouts.main')

@section('container')


<div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
				<div class="text">
					<p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home</a></span> <span>Rooms</span></p>
					<h1 class="mb-4 bread">Rooms</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pb ftco-room">
	<div class="container-fluid px-0">
		<div class="row no-gutters justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">VLOYVE Rooms</span>
				<h2 class="mb-4">Hotel Master's Rooms</h2>
			</div>
		</div>
		<div class="row no-gutters">
			@foreach ($tipe_kamars as $tipe_kamar)
			<div class="col-lg-6">
				<div class="room-wrap d-md-flex ftco-animate">
					@if ($tipe_kamar->img)
					<a href="#" class="img"
						style="background-image: url({{ asset('storage/' . $tipe_kamar->img) }});"></a>
					@else
					<a href="#" class="img" style="background-image: url(images/room-6.jpg);"></a>
					@endif
					<div class="half left-arrow d-flex align-items-center">
						<div class="text p-4 text-center">
							<p class="star mb-0"><span class="ion-ios-star"></span><span
									class="ion-ios-star"></span><span class="ion-ios-star"></span><span
									class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
							<p class="mb-0"><span class="price mr-1">@rupiah($tipe_kamar->harga)</span> <span
									class="per">per night</span>
							</p>
							<h3 class="mb-3"><a href="/tipeKamar/{{ $tipe_kamar->id }}">{{ $tipe_kamar->nama }}</a>
							</h3>
							<p class="pt-1"><a href="/tipeKamar/{{ $tipe_kamar->id }}"
									class="btn-custom px-3 py-2 rounded">View Details
									<span class="icon-long-arrow-right"></span></a></p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
			stroke="#F96D00" />
	</svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
@endsection