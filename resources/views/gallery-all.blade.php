@extends('layouts.secondary-master')
@section('title')
    JRMS Holdings Ltd - Gallery
@stop
@section('secondary-title')
    Gallery
@stop
@section('secondary-body')
    <section id="gallery" data-stellar-background-ratio="0.5" style="padding: 70px 0">
        <div class="container">
            <div class="wow fadeInUp section-title-hold" data-wow-delay="0.2s">
                <p><h3 class="section-title">Gallery</h3></p>
                <p class="title-sub">Take a peek at our gallery</p>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.4s">
                @if (count($gallery) > 0)
                    @foreach($gallery as $gal)
                        <div class="col-sm-3 pb-0">
                            <div class="menu-thumb">
                                <a href="{{ asset('storage/'.$gal->image) }}" class="image-popup" title="{{ $gal->caption }} - {{ $gal->sub_caption1 }}">
                                    <img src="{{ asset('storage/'.$gal->image) }}" class="img-responsive" alt="{{ $gal->caption }}">
                                    <div class="menu-info">
                                        <div class="menu-item">
                                            <h3>{{ $gal->caption }}</h3>
                                            <p>{{ $gal->sub_caption1 }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    No image found
                @endif
            </div>
            @if (count($gallery) > 0)
                <div>{{ $gallery->links() }}</div>
            @endif
        </div>
    </section>
@stop
