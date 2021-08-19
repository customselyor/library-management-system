@extends('layouts.app')

@section('template_title')
    {{ $microorganismsTranslation->name ?? 'Show Microorganisms Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Microorganisms Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('microorganisms-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $microorganismsTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>Microorganism Id:</strong>
                            {{ $microorganismsTranslation->microorganism_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $microorganismsTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $microorganismsTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $microorganismsTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $microorganismsTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
