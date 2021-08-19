@extends('layouts.app')

@section('template_title')
    {{ $growthsTranslation->name ?? 'Show Growths Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Growths Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('growths-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $growthsTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>Growths Id:</strong>
                            {{ $growthsTranslation->growths_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $growthsTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $growthsTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $growthsTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $growthsTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
