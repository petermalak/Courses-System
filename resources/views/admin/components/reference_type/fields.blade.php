<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ form::label('name','Name')}}
            {{form::text('name',$reference_type->name,['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
    </div>
</div>
