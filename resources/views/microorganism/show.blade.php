<x-admin-layout>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Microorganism</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('microorganisms.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $microorganism->key }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $microorganism->image }}
                        </div>
                        <div class="form-group">
                            <strong>Is Favorite:</strong>
                            {{ $microorganism->is_favorite }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $microorganism->status }}
                        </div>
                        <div class="form-group">
                            <strong>Hits Count:</strong>
                            {{ $microorganism->hits_count }}
                        </div>
                        <div class="form-group">
                            <strong>Micro Category Id:</strong>
                            {{ $microorganism->micro_category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Micro Sub Category Id:</strong>
                            {{ $microorganism->micro_sub_category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Micro Child Sub Category Id:</strong>
                            {{ $microorganism->micro_child_sub_category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $microorganism->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $microorganism->updated_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
