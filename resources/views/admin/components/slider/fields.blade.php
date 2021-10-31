<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('title','Title')}}
            {{form::text('title',session()->get('lang') === "en" ? $slider->title : $slider_trans->title,['class'=>'form-control','placeholder'=>'Title'])}}

        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('link','Link')}}
            {{form::text('link',$slider->link,['class'=>'form-control','placeholder'=>'Link'])}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <!-- textarea -->
        <div class="form-group">
            {{ form::label('description','Description')}}
            {{form::text('description',session()->get('lang') === "en" ? $slider->description : $slider_trans->description,['class'=>'form-control','placeholder'=>'Description','row' => '3'])}}

        </div>
    </div>
</div>







