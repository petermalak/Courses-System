<div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{request()->has("lang") && request("lang") === "en"  ? "active" : null}}" href="{{url(request()->url() . "?lang=en")}}" >English</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->has("lang") && request("lang") === "ar" ? "active" : null}}" href="{{url(request()->url() . "?lang=ar")}}">Arabic</a>
        </li>
    </ul>
</div>
