<div {{ $attributes }}>
    {{ $getChildComponentContainer() }}
    <h5>Название ссылки по умолчанию</h5>
    <small><a class="fi-btn-label" target="_blank" href="{{ $getRecord()->file->url() }}"> {{ $getRecord()->file->name }}</a></small>
</div>
