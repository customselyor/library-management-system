@extends('layouts.app')

@section('template_title')
    SANOAT MIKROORGANIZMLARI
@endsection

@section('content')
    <section class="firstBlock">
        <div class="wrap">
            <h2>Sanoat mikroorganizmlari</h2>
            <div class="imagesContent">
                @if($microParentCategories->count()>0)
                    @foreach($microParentCategories as $k=>$v)
                        <div data-aos="fade-down" data-aos-duration="1500" class="image leftSide">
                            <div class="imageTitle">
                                <a href="/parent/{{$v->slug}}">{{$v->title}}</a>
                                @if($k==0)
                                    <img src="./front/resources/first.png" alt="Bakteriyalar (Bacteria)">
                                @elseif($k==1)
                                    <img src="./front/resources/second.png" alt="Aktinomitsetlar (Actinomycetes)">
                                @elseif($k==2)
                                    <img src="./front/resources/third.png" alt="Aktinomitsetlar (Actinomycetes)">
                                @elseif($k==3)
                                    <img src="./front/resources/fourth.png" alt="Aktinomitsetlar (Actinomycetes)">
                                @endif
                            </div>
                            @if(count($v->microOrganisms)>0)
                                <div class="linksContainer">
                                    <div class="links">
                                    @if(Auth::check())
                                        <!-- Links will be listed here as example -->
                                            @foreach($v->microOrganisms as $key=>$val)
                                                @if(Auth::user()->getRoleNames()[0]=='SuperAdmin')
                                                    <div class="link">
                                                        <a href="/parent/{{$v->slug}}/{{$val->slug}}">{{$val->title}}</a>
                                                        <span></span>
                                                    </div>
                                                @elseif($val->role->name==Auth::user()->getRoleNames()[0])
                                                    <div class="link">
                                                        <a href="/parent/{{$v->slug}}/{{$val->slug}}">{{$val->title}}</a>
                                                        <span></span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <span class="vl"></span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="secondBlock">
        <div data-aos="fade-right" data-aos-duration="1500" class="item">
            <img src="./front/resources/loyiha_maqsadi.jpg" alt="Loyiha maqsadi">
            <div class="text">
                <h3>Loyiha maqsadi</h3>
                <span>Loyiha maqsadi loyiha maqsadi loyiha maqsadi loyiha maqsadi loyiha maqsadi</span>
            </div>
        </div>
        <div data-aos="fade-left" data-aos-duration="2000" class="item">
            <div class="text">
                <h3>Kutilayotgan natijalar</h3>
                <span>Kutilayotgan natijalar kutilayotgan natijalar kutilayotgan natijalar kutilayotgan
            natijalar</span>
            </div>
            <img src="./front/resources/kutilayotgan_natijalar.jpg" alt="Kutilayotgan natijalar">
        </div>
        <div data-aos="fade-right" data-aos-duration="2500" class="item">
            <img src="./front/resources/tijoratlashtirish.jpg" alt="Tijoratlashtirish">
            <div class="text">
                <h3>Tijoratlashtirish</h3>
                <span>Tijoratlashtirish tijoratrlashtirish tijoratrlashtirishtijoratrlashtirish</span>
            </div>
        </div>
    </section>
@endsection
