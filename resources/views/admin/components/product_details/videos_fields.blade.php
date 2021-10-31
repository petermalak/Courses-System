@if(Route::current()->getName() !== 'product_details.create')
    @foreach($product_detail['overview_videos'] as $i => $overview_videos)
        <div id="overview_videos">
            <div class="row feature_row">
                <div class="col-md-4">
                    <label name="overview_videos_title">Title</label>
                    <input type="text" name="overview_videos[{{$i}}][title]"
                           value="{{session()->get('lang') === "en" ? $overview_videos['title'] : $product_detail_trans['overview_videos'][$i]['title']}}"
                           placeholder="Enter title" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <label name="overview_videos_link">Link</label>
                    <input type="text" name="overview_videos[{{$i}}][link]" value="{{$overview_videos['link']}}"
                           placeholder="Enter link" class="form-control"/>
                </div>
            </div>
        </div>
    @endforeach
@else
{{--    <div id="overview_videos">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <label name="overview_videos_image">Title</label>--}}
{{--                <input type="text" name="overview_videos[0][title]" placeholder="Enter title" class="form-control"/>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label name="overview_videos_image">Link</label>--}}
{{--                <input type="text" name="overview_videos[0][link]" placeholder="Enter link" class="form-control"/>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div id="overview_videos">
        <div class="row feature_row">
            <div class="col-md-4">
                <label name="overview_videos_image">Title</label>
                <input type="text" name="overview_videos[0][title]" placeholder="Enter title" class="form-control"/>
            </div>
            <div class="col-md-4">
                <label name="overview_videos_image">Link</label>
                <input type="text" name="overview_videos[0][link]" placeholder="Enter link" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label name="overview_videos" class="d-block">Videos</label>
                <button type="button" name="add_overview_videos" id="add_overview_videos" class="btn btn-success">Add More</button>
            </div>
        </div>
    </div>


@endif

<script>
    var u = 1
    $("#add_overview_videos").click(function () {
        $("#overview_videos").append('' +
            '<div class="row mt-4">' +
            '<div class="col-md-4">' +
            '<input type="text" name="overview_videos[' + u + '][title]" placeholder="Enter title" class="form-control" />' +
            '</div>' +
            '<div class="col-md-4">' +
            '<input type="text" name="overview_videos[' + u + '][link]" placeholder="Enter Link" class="form-control" />' +
            '</div>' +
            '<div class="col-md-3">' +
            '<button type="button" name="remove" id="remove_overview_video' + u + '" class="btn btn-danger remove_overview_video">Remove</button>' +
            '</div>' +
            '</div>');
        ++u;
    });

    $(document).on('click', '.remove_overview_video', function () {
        $(this).closest('.row').remove()
    });
</script>


