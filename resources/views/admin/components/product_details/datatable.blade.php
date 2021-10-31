@extends("admin.layouts.index")
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Details</h1>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('product_details.create') }}" type="button" class="btn btn-block btn-primary btn-md">Create
                        Product Details</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Details</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function(){

            $('#slider_datatable tbody').sortable({
                axis: 'y',
                update: function (event, ui) {
                    var data = $(this);
                    var ids = new Array();
                    $('#slider_datatable tbody tr').each(function(){
                        ids.push($(this).attr('id'))
                    });
                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data: {"_token": "{{csrf_token()}}", ids},
                        type: 'POST',
                        url: '{{route("product-details-reorder")}}',
                        success:function (data){
                            if(data)  $("#slider_datatable").DataTable().ajax.reload()
                        }
                    });
                }
            })
        });
    </script>
@endpush
