@extends('layouts.app')

@section('template_title')
    {{ $microParentCategoryTranslation->name ?? 'Show Micro Parent Category Translation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Micro Parent Category Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('micro-parent-category-translations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Locale:</strong>
                            {{ $microParentCategoryTranslation->locale }}
                        </div>
                        <div class="form-group">
                            <strong>Micro Parent Category Id:</strong>
                            {{ $microParentCategoryTranslation->micro_parent_category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $microParentCategoryTranslation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $microParentCategoryTranslation->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $microParentCategoryTranslation->body }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $microParentCategoryTranslation->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
