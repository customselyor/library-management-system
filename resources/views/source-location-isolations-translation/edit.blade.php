@extends('layouts.app')

@section('template_title')
    Update Source Location Isolations Translation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Source Location Isolations Translation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('source-location-isolations-translations.update', $sourceLocationIsolationsTranslation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('source-location-isolations-translation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
