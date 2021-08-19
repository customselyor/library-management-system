@extends('layouts.app')

@section('template_title')
    {{ $page->name ?? 'Show Page' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Page</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pages.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $page->key }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $page->image }}
                        </div>
                        <div class="form-group">
                            <strong>Is Favorite:</strong>
                            {{ $page->is_favorite }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $page->status }}
                        </div>
                        <div class="form-group">
                            <strong>Hits Count:</strong>
                            {{ $page->hits_count }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $page->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $page->updated_by }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $page->category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
