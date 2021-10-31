<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('title','Title')}}
            {{form::text('title',$lecture->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('date','Date')}}
            {{form::text('lecture_date',$lecture->lecture_date,['class'=>'form-control','placeholder'=>'Date'])}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('course','Course')}}
            {{ form::select('course_id', $courses, $lecture->course_id,['class'=>'select2 form-control templatingSelect2', "style"=>"height: 100px"]) }}
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.templatingSelect2').select2({
            theme: "bootstrap4",
        });
    });
</script>
