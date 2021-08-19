@extends('layouts.app')

@section('template_title')
    Create Source Location Isolations Translation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Source Location Isolations Translation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('source-location-isolations-translations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('source-location-isolations-translation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
