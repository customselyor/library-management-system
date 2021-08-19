<x-admin-layout>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Book Text Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-text-types.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $bookTextType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $bookTextType->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>