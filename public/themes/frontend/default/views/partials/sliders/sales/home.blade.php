<div class="mainSlider">
    @foreach(\App\Helpers\Helper::getSlider('sales-home') as $slide)
        <div>
            <img alt="{{ $slide->title }}" src="/{{ $slide->image }}">
        </div>
    @endforeach
</div>
