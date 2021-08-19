@extends('layouts.app')

@section('template_title')
    {{ $bookInventarList->name ?? 'Show Book Inventar List' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Book Inventar List</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-inventar-lists.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Invertar Number:</strong>
                            {{ $bookInventarList->invertar_number }}
                        </div>
                        <div class="form-group">
                            <strong>Is Deleted:</strong>
                            {{ $bookInventarList->is_deleted }}
                        </div>
                        <div class="form-group">
                            <strong>Comment:</strong>
                            {{ $bookInventarList->comment }}
                        </div>
                        <div class="form-group">
                            <strong>Qr Img:</strong>
                            {{ $bookInventarList->qr_img }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $bookInventarList->status }}
                        </div>
                        <div class="form-group">
                            <strong>Book Id:</strong>
                            {{ $bookInventarList->book_id }}
                        </div>
                        <div class="form-group">
                            <strong>Book Inventar Id:</strong>
                            {{ $bookInventarList->book_inventar_id }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $bookInventarList->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $bookInventarList->updated_by }}
                        </div>
                        <div class="form-group">
                            <strong>Extra1:</strong>
                            {{ $bookInventarList->extra1 }}
                        </div>
                        <div class="form-group">
                            <strong>Extra2:</strong>
                            {{ $bookInventarList->extra2 }}
                        </div>
                        <div class="form-group">
                            <strong>Extra3:</strong>
                            {{ $bookInventarList->extra3 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
