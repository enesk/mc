<div class="row">
    <div class="sResultFilter col-xs-12 " id="filterOptions">
        <a class="all active" href="#">
            <button aria-label="Alle Anzeigen" class="btn btn-border btn-gray" type="button">
                Alle Anzeigen
            </button>
        </a>
        @foreach($categories as $category)
            <a class="{{ $category->slug }}" href="#">
                <button aria-label="{{ $category->name }}" class="btn btn-border btn-gray" type="button">
                    {{ $category->name }}
                </button>
            </a>
        @endforeach
    </div>
</div>