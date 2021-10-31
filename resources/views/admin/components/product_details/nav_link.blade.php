<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-general-tab" data-toggle="pill"
                   href="#custom-tabs-four-general" role="tab" aria-controls="custom-tabs-four-general"
                   aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-gallery-tab" data-toggle="pill"
                   href="#custom-tabs-four-gallery" role="tab" aria-controls="custom-tabs-four-gallery"
                   aria-selected="false">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-overview-tab" data-toggle="pill"
                   href="#custom-tabs-four-overview" role="tab" aria-controls="custom-tabs-four-overview"
                   aria-selected="false">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-videos-tab" data-toggle="pill" href="#custom-tabs-four-videos"
                   role="tab" aria-controls="custom-tabs-four-videos" aria-selected="false">Videos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-features-tab" data-toggle="pill"
                   href="#custom-tabs-four-features" role="tab" aria-controls="custom-tabs-four-features"
                   aria-selected="false">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-specifications-tab" data-toggle="pill"
                   href="#custom-tabs-four-specifications" role="tab" aria-controls="custom-tabs-four-specifications"
                   aria-selected="false">Specifications</a>
            </li>
           <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-seo-tab" data-toggle="pill"
                   href="#custom-tabs-four-seo" role="tab" aria-controls="custom-tabs-four-seo"
                   aria-selected="false">SEO</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade  active show" id="custom-tabs-four-general" role="tabpanel"
                 aria-labelledby="custom-tabs-four-general-tab">
                @include('admin.components.product_details.general_fields')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-gallery" role="tabpanel"
                 aria-labelledby="custom-tabs-four-gallery-tab">
                @include('admin.components.product_details.gallery_fields')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-overview" role="tabpanel"
                 aria-labelledby="custom-tabs-four-overview-tab">
                @include('admin.components.product_details.overview_fields')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-videos" role="tabpanel"
                 aria-labelledby="custom-tabs-four-videos-tab">
                @include('admin.components.product_details.videos_fields')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-features" role="tabpanel"
                 aria-labelledby="custom-tabs-four-features-tab">
                @include('admin.components.product_details.features_fields')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-specifications" role="tabpanel"
                 aria-labelledby="custom-tabs-four-specifications-tab">
                @include('admin.components.product_details.specifications_fields')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-seo" role="tabpanel"
                 aria-labelledby="custom-tabs-four-seo-tab">
                @include('admin.components.product_details.seo_fields')
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
