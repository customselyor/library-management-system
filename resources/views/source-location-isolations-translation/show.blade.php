@extends('layouts.app')

@section('template_title')
    {{ $sourceLocationIsolationsTranslation->name ?? 'Show Source Location Isolations Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Source Location Isolations Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('source-location-isolations-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $sourceLocationIsolationsTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>Source Location Isolations Id:</strong>
                            {{ $sourceLocationIsolationsTranslation->source_location_isolations_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $sourceLocationIsolationsTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $sourceLocationIsolationsTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $sourceLocationIsolationsTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $sourceLocationIsolationsTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
