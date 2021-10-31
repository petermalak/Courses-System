<div class="row">
    <div class="col-sm-12">
        {{ form::label('title','Gallery')}}
        {{ form::hidden('gallery','', array('id' => 'gallery')) }}
        <a class="nav-link btn-default"
           style="cursor: pointer"
           data-toggle="modal"
           data-target="#gallery_upload"
        >Browse Media
        <span class="float-right green gallery_upload"></span>
        </a>
    </div>
</div>
