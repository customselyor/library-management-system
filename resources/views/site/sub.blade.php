
@extends('layouts.app')

@section('template_title')
    {{$microSubCategories->title}}
@endsection

@section('content')
    <section class="firstBlock" data-aos="fade-left" data-aos-duration="1500">
        <div class="wrap">
            <h2>{{$microSubCategories->title}}</h2>
            <div class="imagesContent" style="justify-content: center;">
                @if($microSubCategories->count()>0)
                    <div  class="image leftSide" style="width: 100%;">
                        <div class="imageTitle">
                            {{--<a href="/parent/{{$microParentCategories->slug}}">{{$microParentCategories->title}}</a>--}}
                            {{--<img src="/front/resources/first.png" alt="Bakteriyalar (Bacteria)">--}}
                        </div>
                        @if(count($microSubCategories->microChildSubCategories)>0)
                            <div class="linksContainer" style="justify-content: center; width: 100%;">
                                <div class="links">
                                    <!-- Links will be listed here as example -->
                                    @foreach($microSubCategories->microChildSubCategories as $key=>$val)
                                        <div class="link">
                                            <a href="/parent/{{$parent_id}}/{{$cat}}/{{$microSubCategories->slug}}/{{$val->slug}}">{{$val->title}}</a>
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