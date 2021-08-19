@extends('layouts.app')

@section('template_title')
    {{ $conditionsGrowthsTranslation->name ?? 'Show Conditions Growths Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Conditions Growths Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('conditions-growths-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $conditionsGrowthsTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>Conditions Growths Id:</strong>
                            {{ $conditionsGrowthsTranslation->conditions_growths_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $conditionsGrowthsTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $conditionsGrowthsTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $conditionsGrowthsTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $conditionsGrowthsTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
