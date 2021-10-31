<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('title','Title')}}
            {{form::text('title',session()->get('lang') === "en" ? $product_detail['title'] : $product_detail_trans['title'],['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
    </div>
    <div class="col-sm-6">
        {{ form::label('title','Thumbnail Image')}}
        {{ form::hidden('thumbnail_image', $product_detail['thumbnail_image'], array('id' => 'thumbnail_image')) }}
        <a class="nav-link btn-default"
           style="cursor: pointer"
           data-toggle="modal"
           data-target="#thumbnail"
        >Browse Media
            <span class="float-right green thumbnail"></span>
        </a>

    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('description','Description')}}
            {{form::text('description',session()->get('lang') === "en" ? $product_detail['description'] : $product_detail_trans['description'],['class'=>'form-control','placeholder'=>'Description'])}}
        </div>
    </div>
    <div class="col-sm-4">
        {{ form::label('title','Banner Image')}}
        
        {{ form::hidden('banner_image', session()->get('lang') === "en" ? $product_detail['banner']['banner_image'] : $product_detail_trans['banner']['banner_image'], array('id' => 'banner_image')) }}
        <!-- {{ form::hidden('banner_image', $product_detail['banner'] ? $product_detail['banner']['banner_image'] : "", array('id' => 'banner_image')) }} -->

        <a class="nav-link btn-default"
           style="cursor: pointer"
           data-toggle="modal"
           data-target="#banner"
        >Browse Media
            <span class="float-right green banner"></span>
        </a>

    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('link','Banner Link')}}
            {{form::text('banner[banner_link]',$product_detail['banner'] ? $product_detail['banner']['banner_link'] : "",['class'=>'form-control','placeholder'=>'Link'])}}
        </div>
    </div>
</div>
