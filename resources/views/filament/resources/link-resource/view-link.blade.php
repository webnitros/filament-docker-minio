
    <span>{{\App\Facades\Minio::link($hash)}}</span>
    <br>
    <br>
    <x-filament::link color="success" icon="heroicon-o-link" target="_blank" href="{{\App\Facades\Minio::link($hash)}}"
    >Ссылка для просмотра
    </x-filament::link>
    <br>
    <x-filament::link color="success" icon="heroicon-m-inbox-arrow-down" target="_blank" href="{{\App\Facades\Minio::link($hash)}}?mode=download"
    >Ссылка для скачивания
    </x-filament::link>
