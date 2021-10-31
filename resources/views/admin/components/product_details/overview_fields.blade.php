@if(Route::current()->getName() !== 'product_details.create')
    @if($product_detail['overview'] !== [])
        @foreach($product_detail['overview'] as $i => $overview)
            <div class="overview_edit">
                <div class="row" id="overview_row_edit">
                    <div class="col-md-3">
                        <label name="overview_title">Title</label>
                        <input type="text" name="overview[{{$i}}][title]"
                               value="{{session()->get('lang') === "en" ? $overview['title'] : $product_detail_trans['overview'][$i]['title']}}"
                               placeholder="Enter title" class="form-control"/>
                    </div>
                    <div class="col-md-3">
                        <label name="overview_description">description</label>
                        <textarea name="overview[{{$i}}][description]" placeholder="Enter description" class="form-control" >{{session()->get('lang') === "en" ? $overview['description'] : $product_detail_trans['overview'][$i]['description']}}</textarea>

                    </div>
                    <div class="col-md-3">
                        <label name="overview_image">Image</label>
                        <a class="nav-link btn-default"
                           style="cursor: pointer"
                           data-toggle="modal"
                           data-target="#overview_upload_{{$i}}"
                        >Browse Media</a>
                        <input type="hidden" class="overview_images_{{$i}}" name="overview[{{$i}}][upload_id]" value="{{$product_detail_trans['overview'][$i]['upload_id']}}" id="overview_images_{{$i}}"/>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="button" value="{{$i}}_{{$product_detail['id']}}" name="remove" id="remove_overview_{{$i}}" class="btn btn-danger remove_overview_edit">Remove</button>
                    </div>
                </div>
                <input type="hidden" name="overview_images[]" id="overview_images_{{$i}}"/>
            </div>
        @endforeach
        <div class="col-md-3">
            <label name="overviews" class="d-block">Overviews</label>
                <a type="button" name="add_overview_edit" id="add_overview_edit" class="btn btn-success" onclick='addMoreOverviews({{count($product_detail['overview'])}})'>Add More</a>
        </div>
    @else
        <div class="alert alert-default-info text-center" style="margin:15px" role="alert">
            <span>No Overviews</span>
        </div>
    @endif

@else
    <div id="overview">
        <div class="row overview_row" id="0">
            <div class="col-md-3">
                <label name="overview_title">Title</label>
                <input type="text" name="overview[0][title]" placeholder="Enter title" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label name="overview_description">Description</label>
                <textarea name="overview[0][description]" placeholder="Enter description" class="form-control"></textarea>
            </div>
            <div class="col-md-3">
                <label name="overview_image">Image</label>
                <a class="nav-link btn-default overview_button_0"
                   style="cursor: pointer"
                   data-toggle="modal"
                   data-target="#overview_upload_0"
                   onclick='addActiveAndRemoveActiveOverView($(this))'
                >Browse Media
                    <span class="float-right green overview_upload_0 overview_upload" data-overview="0"></span>
                </a>
                <input type="hidden" class="overview_images_0" name="overview[0][upload_id]" id="overview_images_0"/>
            </div>
            <div class="col-md-3">
                <label name="overviews" class="d-block">Overviews</label>
                <button type="button" name="add_overview" id="add_overview" class="btn btn-success">Add More</button>
            </div>
        </div>
        <input type="hidden" name="overview_images" id="overview_images"/>
    </div>
@endif

<script>
    var t = 0;
    var y = 1
    $("#add_overview").click(function () {
        $("#overview").append('' +
            '<div class="row mt-4">' +
            '<div class="col-md-3">' +
            '<input type="text" name="overview[' + y + '][title]" placeholder="Enter title" class="form-control" />' +
            '</div>' +
            '<div class="col-md-3">' +
            '<textarea name="overview[' + y + '][description]" placeholder="Enter description" class="form-control"></textarea>'+
            '</div>' +
            '<div class="col-md-3">' +
            '<a class="nav-link btn-default overview_button" style="cursor: pointer" data-toggle="modal" data-target="#overview_upload_'+ y +'" onclick="addActiveAndRemoveActiveOverView($(this))">Browse Media' +
            '<span class="float-right green overview_upload_' + y + ' overview_upload" data-overview="' + y + '"></span>' +
            '</a>' +
            '</div>' +
            '<input type="hidden" class="closest" name="overview['+ y +'][upload_id]" id="overview_images_'+ y +'"/>'+
            '<div class="col-md-3">' +
            '<button type="button" name="remove" id="remove_overview_' + y + '" class="btn btn-danger remove_overview">Remove</button>' +
            '</div>' +
            '</div>');
        addMediaOverview(y)

        ++y;
    });

    function addActiveAndRemoveActiveOverView(x,id) {

        $(".overview_upload").each(function (s) {
            $($(".overview_upload")[s]).removeClass("active")
        })
        x.children("span").addClass("active")

    }

    function addMoreOverviews(lenght){
        if (t == 0){
            t = lenght
        }
            $(".overview_edit:last").append('' +
                '<div class="row mt-4">' +
                '<div class="col-md-3">' +
                '<input type="text" name="overview[' + t + '][title]" placeholder="Enter title" class="form-control" />' +
                '</div>' +
                '<div class="col-md-3">' +
                '<textarea name="overview[' + t + '][description]" placeholder="Enter description" class="form-control" ></textarea>'+
                '</div>' +
                '<div class="col-md-3">' +
                '<a class="nav-link btn-default overview_button" style="cursor: pointer" data-toggle="modal" data-target="#overview_upload_'+ t +'" onclick="addActiveAndRemoveActiveOverView($(this))">Browse Media' +
                '<span class="float-right green overview_upload_' + t + ' overview_upload" data-overview="' + t + '"></span>' +
                '</a>' +
                '</div>' +
                '<input type="hidden" class="closest" name="overview['+ t +'][upload_id]" id="overview_images_'+ t +'"/>'+
                '<div class="col-md-3">' +
                '<button type="button" name="remove" id="remove_overview_' + t + '" class="btn btn-danger remove_overview">Remove</button>' +
                '</div>' +
                '</div>');
            addMediaOverview(t)

            ++t;

    }

    function addMediaOverview(id) {
        $.ajax({
            url: "{{ route('media.get')}}",
            method: "POST",
            data: {_token: "{{csrf_token()}}", upload_type: "single",section_id:'overview_images_'+id,modal_name:'overview_upload_'+id},
            success: function (data) {
                $('#parent-card').append(data);
            },
        });
    }

    $(document).on('click', '.remove_overview', function () {
        $(this).closest('.row').remove()
    });

    $(document).on('click', '.remove_overview_edit', function () {
        // $(this).closest('#overview_row_edit').find('input:text, textarea, input:hidden')
        //                                     .each(function () {
        //                                         $(this).val('');
        //                                     });
        $(this).closest('#overview_row_edit').remove();

        //prevent from clicking any button untill request finish
        var div= document.createElement("div");
        div.className += "overlay";
        document.body.appendChild(div);

        var values =$(this).val().split('_');
        var row_id =  values[0]
        var id =  values[1]
        console.log(row_id , id)
        $.ajax({
            url: "{{ route('product-details-remove-row') }}",
            method: "POST",
            data: {_token: "{{csrf_token()}}", id: id , row_id: row_id , type:'overview'},
            success: function (data) {
                if(data){
                    location.reload();
                }
            },
        });
    });
</script>
