@extends("admin.layouts.index")
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sliders</h1>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('slider.create') }}" type="button" class="btn btn-block btn-primary btn-md">Create
                        Slider</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sliders</h3>

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
                    @foreach($sliders as $slider)
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <span>
                                    {{$slider->title}}
                                </span>
                            </td>
                            <td>
                                <span>
                                    {{$slider->description}}
                                </span>
                            </td>
                            <td class="project_progress">
                                <span>
                                    {{$slider->link}}
                                </span>
                            </td>
                            <td class="project-actions text-right">
                                <div class="row m-0 p-0">
                                    <div class="col-md-6">
                                        <a class="btn btn-info btn-sm" href="{{route('slider.edit',$slider->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="POST" action="{{ route('slider.destroy', $slider->id ) }}">
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


@endsection
