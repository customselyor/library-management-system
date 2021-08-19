<x-admin-layout>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Book Text</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-texts.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $bookText->name }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $bookText->code }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {!! ($bookText->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>