@if(Route::current()->getName() !== 'product_details.create')
    @if($product_detail['features'] !== [])
        @foreach($product_detail['features'] as $i => $features)
            <div class="features_edit">
                <div class="row" id="features_row_edit">
                    <div class="col-md-3">
                        <label name="features_title">Title</label>
                        <input type="text" name="features[{{$i}}][title]"
                               value="{{session()->get('lang') === "en" ? $features['title'] : $product_detail_trans['features'][$i]['title']}}"
                               placeholder="Enter title" class="form-control"/>
                    </div>
                    <div class="col-md-3">
                        <label name="features_description">Description</label>
                        <textarea name="features[{{$i}}][description]" placeholder="Enter description" class="form-control" >{{session()->get('lang') === "en" ? $features['description'] : $product_detail_trans['features'][$i]['description']}}</textarea>
                    </div>
                    <div class="col-md-3">
                        <label name="features_image">Image</label>
                        <a class="nav-link btn-default"
                           style="cursor: pointer"
                           data-toggle="modal"
                           data-target="#features_upload_{{$i}}"
                        >Browse Media</a>
                        <input type="hidden" class="features_images_{{$i}}" name="features[{{$i}}][upload_id]" value="{{$product_detail_trans['features'][$i]['upload_id']}}" id="features_images_{{$i}}"/>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="button" value="{{$i}}_{{$product_detail['id']}}" name="remove" id="remove_features_{{$i}}" class="btn btn-danger remove_features_edit">Remove</button>
                    </div>
                </div>
                <input type="hidden" name="features_images[]" id="features_images_{{$i}}"/>
            </div>
        @endforeach
        <div class="col-md-3">
            <label name="features" class="d-block">Features</label>
            <a type="button" name="add_features_edit" id="add_features_edit" class="btn btn-success" onclick='addMoreFeatures({{count($product_detail['features'])}})'>Add More</a>
        </div>
    @else
        <div class="alert alert-default-info text-center" style="margin:15px" role="alert">
            <span>No Features</span>
        </div>
    @endif
@else

    <div id="features">
        <div class="row">
            <div class="col-md-3">
                <label for="features_title">Title</label>
                <input type="text" name="features[0][title]" placeholder="Enter title" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label for="features_description">Description</label>
{{--                <input type="text" name="features[0][description]" placeholder="Enter description"--}}
{{--                       class="form-control"/>--}}
                <textarea name="features[0][description]" placeholder="Enter description" class="form-control"></textarea>
            </div>
            <div class="col-md-3">
                <label name="features_image">Image</label>
                <a class="nav-link btn-default"
                   style="cursor: pointer"
                   data-toggle="modal"
                   data-target="#features_upload_0"
                   onclick='addActiveAndRemoveActiveFeatures($(this))'
                >Browse Media
                    <span class="float-right green features_upload_0 features_upload" data-features="0"></span>
                </a>
                <input type="hidden" class="features_images_0" name="features[0][upload_id]" id="features_images_0"/>
            </div>
            <input type="hidden" class="closest" name="features[0][upload_id]" id="features_images_0"/>
            <div class="col-md-3">
                <label for="add_features" class="d-block">Features</label>
                <button type="button" name="add_features" id="add_features" class="btn btn-success">Add More</button>
            </div>
        </div>
        <input type="hidden" name="features_images" id="features_images"/>
    </div>
@endif


<script>
    var v = 0;
    var i = 1;
    $("#add_features").click(function () {
        $("#features").append('<div class="row mt-3">' +
            '<div class="col-md-3">' +
            '<input type="text" name="features[' + i + '][title]" placeholder="Enter title" class="form-control" />' +
            '</div>' +
            '<div class="col-md-3">' +
            '<textarea name="features[' + i + '][description]" placeholder="Enter description" class="form-control"></textarea>'+
            '</div>' +
            '<div class="col-md-3">' +
            '<a class="nav-link btn-default" style="cursor: pointer" data-toggle="modal" data-target="#features_upload_'+ i +'" onclick="addActiveAndRemoveActiveFeatures($(this))">Browse Media' +
            '<span class="float-right green features_upload_' + i + ' features_upload" data-features="' + i + '"></span>' +
            '</a>' +
            '</div>' +
            '<input type="hidden" class="closest" name="features[' + i + '][upload_id]" id="features_images_' + i + '"/>' +
            '<div class="col-md-3">' +
            '<button type="button" name="remove" id="remove_features_' + i + '" class="btn btn-danger remove_features">Remove</button>' +
            '</div>' +
            '</div>');
        addMediaFeatures(i)
        ++i;
    });

    function addActiveAndRemoveActiveFeatures(x) {
        $(".features_upload").each(function (s) {
            $($(".features_upload")[s]).removeClass("active")
        })
        x.children("span").addClass("active")
    }

    function addMoreFeatures(lenght){
        if (v == 0){
            v = lenght
        }
        $(".features_edit:last").append('' +
            '<div class="row mt-4">' +
            '<div class="col-md-3">' +
            '<input type="text" name="features[' + v + '][title]" placeholder="Enter title" class="form-control" />' +
            '</div>' +
            '<div class="col-md-3">' +
            '<textarea name="features[' + v + '][description]" placeholder="Enter description" class="form-control" ></textarea>'+
            '</div>' +
            '<div class="col-md-3">' +
            '<a class="nav-link btn-default features_button" style="cursor: pointer" data-toggle="modal" data-target="#features_upload_'+ v +'" onclick="addActiveAndRemoveActiveOverView($(this))">Browse Media' +
            '<span class="float-right green features_upload_' + v + ' features_upload" data-features="' + v + '"></span>' +
            '</a>' +
            '</div>' +
            '<input type="hidden" class="closest" name="features['+ v +'][upload_id]" id="features_images_'+ v +'"/>'+
            '<div class="col-md-3">' +
            '<button type="button" name="remove" id="remove_features_' + v + '" class="btn btn-danger remove_features">Remove</button>' +
            '</div>' +
            '</div>');
        addMediaFeatures(v)

        ++v;

    }

    function addMediaFeatures(id) {
        $.ajax({
            url: "{{ route('media.get')}}",
            method: "POST",
            data: {_token: "{{csrf_token()}}", upload_type: "single",section_id:'features_images_'+id,modal_name:'features_upload_'+id},
            success: function (data) {
                $('#parent-card').append(data);
            },
        });
    }
    $(document).on("click", ".remove_features", function () {
        $(this).closest('.row').remove()
    });

    $(document).on('click', '.remove_features_edit', function (e) {
        e.preventDefault();
        $(this).closest('#features_row_edit').remove();

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
            data: {_token: "{{csrf_token()}}", id: id , row_id: row_id , type:'features'},
            success: function (data) {
                if(data){
                    location.reload();
                }
            },
        });
    });
</script>
