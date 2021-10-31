@extends("admin.layouts.index")
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings</h1>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Settings</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                {!! form::open(['route'=>['settings.update'],'id'=>'form-data', 'method'=>"post"] ) !!}
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 30%">
                            Name
                        </th>
                        <th style="width: 30%">
                            Value
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @csrf
                    @foreach($settings as $setting)
                        <tr>
                            <td>
                                <span>
                                    {{$setting->message}}
                                </span>
                            </td>
                            <td>
                                @if($setting->type == 'default_lang')
                                    {{ form::select($setting->type, ['en' => 'English','ar' => 'Arabic'], null,['class'=>'select2 form-control templatingSelect2', "style"=>"height: 100px; width:100%"]) }}
                                @elseif($setting->type == 'seo_description')
                                    {{form::textarea($setting->type, $setting->value, ['class'=>'form-control'])}}
                                @elseif($setting->type == 'logo_en' || $setting->type == 'logo_ar')
                                    {{ form::hidden($setting->type,$setting->value, array('id' => $setting->type)) }}
                                    <a class="nav-link btn-default"
                                       style="cursor: pointer"
                                       data-toggle="modal"
                                       data-target="#{{$setting->type}}_upload"
                                    >Browse Media
                                        <span class="float-right green {{$setting->type}}_upload"></span>
                                    </a>
                                @else
                                    {{ form::text($setting->type, $setting->value, ['class'=>'form-control']) }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!!form::close()!!}
                @foreach($settings as $setting)
                    @if($setting->type == 'logo_en' ||$setting->type == 'logo_ar')
                        @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' =>(int) $setting->value,'modal_name'=>$setting->type.'_upload','section_id'=>$setting->type] )
                    @endif
                @endforeach
                @include('admin.widgets.uploader.mediaNav',$attr = ['upload_type' => 'single', 'upload_id' => 0,'modal_name'=>'logo_ar_upload','section_id'=>'logo_ar'] )
                <button type="submit" class="btn btn-success float-right m-3" onclick="$('#form-data').submit()">Save
                    Changes
                </button>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    <script>
        $(document).ready(function () {
            $('.templatingSelect2').select2({
                theme: "bootstrap4",
            });
        });
    </script>

@endsection
