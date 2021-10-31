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
                            <h3 class="card-title">Edit Product Details</h3>
                        </div>
                        <div class="card-body" id="parent-card">
                            {!! form::open(['route'=>['product_details.update',$product_detail['id']],'id'=>'form-data'] ) !!}
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="card card-primary card-outline card-outline-tabs">
                                @include('admin.widgets.lang_nav.nav_link')
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade active show" id="english" role="tabpanel" aria-labelledby="english-tab">
                                            {{ session()->put('lang',request("lang"))}}
                                            @include('admin.components.product_details.nav_link')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!!form::close()!!}
                            <button type="submit" class="btn btn-block btn-success" onclick="$('#form-data').submit()">Submit</button>
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => $product_detail['thumbnail_image'],'modal_name'=>'thumbnail','section_id'=>'thumbnail_image'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => session()->get('lang') === "en" ? $product_detail['banner']['banner_image'] : $product_detail_trans['banner']['banner_image'],'modal_name'=>'banner','section_id'=>'banner_image'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'multi', 'upload_id' =>     json_encode($product_detail['gallery']),'modal_name'=>'gallery_upload','section_id'=>'gallery'] )
                            @foreach($product_detail['overview'] as $i => $overview)
                                @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => $overview['upload_id']==null?0:$overview['upload_id'],'modal_name'=>'overview_upload_'.$i,'section_id'=>'overview_images_'.$i ])
                            @endforeach
                            @foreach($product_detail['features'] as $i => $feature)
                                @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => $feature['upload_id']==null?0:$feature['upload_id'],'modal_name'=>'features_upload_'.$i,'section_id'=>'features_images_'.$i] )
                            @endforeach
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'multi', 'upload_id' => 0,'modal_name'=>'features_upload','section_id'=>'new_features_images'] )
                            @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'multi', 'upload_id' => 0,'modal_name'=>'overview_upload','section_id'=>'new_overview_images'] )
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


