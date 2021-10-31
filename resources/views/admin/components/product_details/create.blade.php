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
                            <h3 class="card-title">Create Product Details</h3>
                        </div>
                        <div class="card-body" id="parent-card">
                            {!! form::open(['route'=>['product_details.store',$product_detail],'id'=>'form-data'] ) !!}
                            @method('POST')
                            {{csrf_field()}}
                            @include('admin.components.product_details.nav_link')
                            {!!form::close()!!}
                            <button type="submit" class="btn btn-block btn-success" onclick="$('#form-data').submit()">
                                Submit
                            </button>
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => old('thumbnail_image')?old('thumbnail_image'):0,'modal_name'=>'thumbnail','section_id'=>'thumbnail_image'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => old('banner_image')?old('banner_image'):0,'modal_name'=>'banner','section_id'=>'banner_image'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'multi', 'upload_id' => old('gallery')?json_encode(convert_to_int(old('gallery'))):0,'modal_name'=>'gallery_upload','section_id'=>'gallery'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => old('overview_images')?old('overview_images'):0,'modal_name'=>'overview_upload_0','section_id'=>'overview_images_0'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => old('features_images')?old('features_images'):0,'modal_name'=>'features_upload_0','section_id'=>'features_images_0'] )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


