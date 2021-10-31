<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('title','SEO Title')}}
            {{form::text('seo_title',session()->get('lang') === "en" ? $product_detail['seo_title'] : $product_detail_trans['seo_title'],['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('keywords','Keywords')}}
            {{form::text('seo_keywords',session()->get('lang') === "en" ? $product_detail['seo_keywords'] : $product_detail_trans['seo_keywords'],['class'=>'form-control','placeholder'=>'Keywords'])}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ form::label('description','SEO Description')}}
            {{form::textarea('seo_description',session()->get('lang') === "en" ? $product_detail['seo_description'] : $product_detail_trans['seo_description'],['class'=>'form-control','placeholder'=>'Description'])}}
        </div>
    </div>
</div>
