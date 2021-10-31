@extends("admin.layouts.index")
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit</h1>
                </div>
                <div class="col-sm-6">
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
                            <h3 class="card-title">Edit Slider</h3>
                        </div>
                        <div class="card-body">
                            {!! form::open(['route'=>['slider.update',$slider],'id'=>'form-data'] ) !!}
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="card card-primary card-outline card-outline-tabs">
                                @include('admin.widgets.lang_nav.nav_link')
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade active show" id="english" role="tabpanel" aria-labelledby="english-tab">
                                            {{ session()->put('lang',request("lang"))}}
                                            @include('admin.components.slider.fields')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ form::hidden('upload_id', $slider->upload_id, array('id' => 'upload_id')) }}
                            {!!form::close()!!}
                            {{ form::label('image','Image')}}
                            <a class="nav-link btn-default mb-2"
                               style="cursor: pointer"
                               data-toggle="modal"
                               data-target="#media"
                            >Browse Media</a>
                            @include('admin.widgets.uploader.mediaNav', $attr = ['upload_type' => 'single', 'upload_id' => $slider->upload_id]  )
                            <button type="submit" class="btn btn-block btn-success" onclick="$('#form-data').submit()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


