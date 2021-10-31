<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('title','Title')}}
            {{form::text('title',$course->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('code','Code')}}
            {{form::text('code',$course->code,['class'=>'form-control','placeholder'=>'Code'])}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('speaker','Speaker')}}
            {{form::text('speaker',$course->speaker,['class'=>'form-control','placeholder'=>'Speaker'])}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ form::label('description','Description')}}
            {{form::textarea('description',$course->description,['class'=>'form-control','placeholder'=>'Description'])}}
        </div>
    </div>
</div>
