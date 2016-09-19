<div class="row">
<div class="col-md-12 col-md-offset-0">
    <div class="mainSlider">
        @foreach(\App\Helpers\Helper::getSlider('sales-home') as $slide)
            <div>
                <img alt="{{ $slide->title }}" src="/{{ $slide->image }}">
            </div>
        @endforeach
    </div>
</div>
</div>