@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <header class="masthead"
        style="background-image: url('https://images.unsplash.com/photo-1550184658-ff6132a71714?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2180&q=80')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="site-heading text-center">
                        <h2 class="hero">Selamat Datang!</h3>
                            <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="bab pt-2" id="event">
        <h2 class="mt-3 text-center">Event</h3>
    </div>
    @forelse ($events as $event)
        <div id="movie-card-list">
            <div class="movie-card" id="event_image"
                style="background-image: url({{ asset('storage/event-images/' . $event->image) }})">
                <div class="movie-card__overlay"></div>
                <div class="movie-card__share">
                    {{-- <button class="movie-card__icon"><i class="material-icons">&#xe80d</i></button> --}}
                </div>
                <div class="movie-card__content">
                    <div class="movie-card__header">
                        <h2 class="movie-card__title mt-4">{{ $event->title }}</h1>
                            <h4 class="movie-card__info">{{ $event->start_date->translatedFormat('d M Y H:i') }} WIB</h4>
                    </div>
                    <h5 class="movie-card__title place mt-2">{{ $event->place }}</h5>
                    <h6 class="movie-card__title">{{ $event->address }}</h6>
                    <a href="/pembayaran/{{ $event->slug }}" class="btn btn-outline movie-card__button mt-2"
                        type="button">Ikuti Event</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-lg-12 d-flex justify-content-center">
            <h2 class="text-danger mx-auto my-4">Tidak ada event!</h2>
        </div>
    @endforelse
    <script>
        $(window).load({
            $('#event_image').Lazy({
                // your configuration goes here
                scrollDirection: 'vertical',
                effect: 'fadeIn',
                visibleOnly: true,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                }
            });

        });
    </script>
@endsection
