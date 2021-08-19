@extends('layouts.app')

@section('template_title')
    {{ $mAuthorsTranslation->name ?? 'Show M Authors Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show M Authors Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('m-authors-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $mAuthorsTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>M Authors Id:</strong>
                            {{ $mAuthorsTranslation->m_authors_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $mAuthorsTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $mAuthorsTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $mAuthorsTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $mAuthorsTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
