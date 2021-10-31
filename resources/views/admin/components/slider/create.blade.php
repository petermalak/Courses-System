@extends("admin.layouts.index")
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Slider</h3>
                        </div>
                        <div class="card-body">
                            {!! form::open(['route'=>['slider.store',$slider],'id'=>'form-data'] ) !!}
                                @method('POST')
                                {{csrf_field()}}
                                @include('admin.components.slider.fields')
                                {{ form::hidden('upload_id', '', array('id' => 'upload_id')) }}
                            {!!form::close()!!}
                            {{ form::label('image','Image')}}
                            <a class="nav-link btn-default mb-2"
                            style="cursor: pointer"
                            data-toggle="modal"
                            data-target="#media"
                            >Browse Media</a>
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => old('upload_id')?old('upload_id'):0] )
                            <button type="submit" class="btn btn-block btn-success" onclick="$('#form-data').submit()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


