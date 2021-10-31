<div class="row">
    @foreach($product_detail['specifications'] as $i=>$specification)
{{--        {{dd($product_detail['specifications'][$i]['name'])}}--}}
        <div class="col-sm-3">
            <div class="form-group">
                {{ form::label('specifications['.$specification['name'].']',$specification['label'])}}
                {{form::text('specifications['.$specification['name'].']',session()->get('lang') === "en" ? $specification['value'] : $product_detail_trans['specifications'][$i]['value'],['class'=>$specification['class'],'placeholder'=>$specification['placeholder']])}}
            </div>
        </div>
    @endforeach
</div>

