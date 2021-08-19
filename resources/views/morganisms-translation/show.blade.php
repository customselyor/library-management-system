@extends('layouts.app')

@section('template_title')
    {{ $morganismsTranslation->name ?? 'Show Morganisms Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Morganisms Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('morganisms-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $morganismsTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>Morganisms Id:</strong>
                            {{ $morganismsTranslation->morganisms_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $morganismsTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $morganismsTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Strain Label:</strong>
                            {{ $morganismsTranslation->strain_label }}
                        </div>
                        <div class="form-group">
                            <strong>Enzymatic Activity Extreme Conditions Protein:</strong>
                            {{ $morganismsTranslation->enzymatic_activity_extreme_conditions_protein }}
                        </div>
                        <div class="form-group">
                            <strong>Characteristics Produced Compounds:</strong>
                            {{ $morganismsTranslation->characteristics_produced_compounds }}
                        </div>
                        <div class="form-group">
                            <strong>Pathogenicity:</strong>
                            {{ $morganismsTranslation->pathogenicity }}
                        </div>
                        <div class="form-group">
                            <strong>Comments:</strong>
                            {{ $morganismsTranslation->comments }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $morganismsTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $morganismsTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
