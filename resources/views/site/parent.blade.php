
@extends('layouts.app')

@section('template_title')
    SANOAT MIKROORGANIZMLARI
@endsection

@section('content')
    <section class="firstBlock">
        <div class="wrap">
            <h2>{{$microParentCategories->title}}</h2>
            <div class="imagesContent" style="justify-content: center;">
                @if($microParentCategories->count()>0)
                    <div data-aos="fade-down" data-aos-duration="1500" class="image leftSide">
                        <div class="imageTitle">
                            {{--<a href="/parent/{{$microParentCategories->slug}}">{{$microParentCategories->title}}</a>--}}
                            {{--<img src="/front/resources/first.png" alt="Bakteriyalar (Bacteria)">--}}
                        </div>
                        @if(count($microParentCategories->microOrganisms)>0)
                            <div class="linksContainer">
                                <div class="links">
                                    <!-- Links will be listed here as example -->
                                    @foreach($microParentCategories->microOrganisms as $key=>$val)
                                        <div class="link">
                                            <a href="/parent/{{$microParentCategories->slug}}/{{$val->slug}}">{{$val->title}}</a>
                                            <span></span>
                                        </div>
                                    @endforeach
                                </div>
                                <span class="vl"></span>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection