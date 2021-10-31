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
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Slider Title
                        </th>
                        <th style="width: 30%">
                            Description
                        </th>
                        <th>
                            Link
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product_details as $product_detail)
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <span>
                                    {{$product_detail->title}}
                                </span>
                            </td>
                            <td>
                                <span>
                                    {{$product_detail->description}}
                                </span>
                            </td>
                            <td class="project_progress">
                                <span>
                                    {{$product_detail->thumbnail_image}}
                                </span>
                            </td>
                            <td class="project-actions text-right">
                                <div class="row m-0 p-0">
                                    <div class="col-md-6">
                                        <a class="btn btn-info btn-sm edit-btn" href="{{route('product_details.edit',$product_detail->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="POST" action="{{ route('product_details.destroy', $product_detail->id ) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    <script>
        $(document).ready(function(){
            $(".edit-btn").each(function(){
                if(!$(this).attr("href").includes("?lang")){
                    $(this).attr("href", $(this).attr("href") + "?lang=en")
                }
            })
        })
    </script>
@endsection
