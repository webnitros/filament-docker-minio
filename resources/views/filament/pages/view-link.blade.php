<x-filament-panels::page>
    @if ($this->hasInfolist())
        {{ $this->infolist }}
    @else

        <x-filament::section
            icon="heroicon-o-link"

            content-before="выфвфыв"
            heading="{{\App\Facades\Minio::link($this->record->hash)}}"

        >
            <x-filament::link color="success" icon="heroicon-o-link"
                              target="_blank"
                              href="{{ \App\Facades\Minio::link($this->record->hash) }}"
            >Ссылка для просмотра</x-filament::link>

            <br>
            <x-filament::link color="success" icon="heroicon-m-inbox-arrow-down"
                              target="_blank"
                              href="{{ \App\Facades\Minio::link($this->record->hash) }}?mode=download"
            >Ссылка для скачивания</x-filament::link>

        </x-filament::section>

        {{ $this->form }}
    @endif

    @if (count($relationManagers = $this->getRelationManagers()))
        <x-filament-panels::resources.relation-managers
            :active-manager="$activeRelationManager"
            :managers="$relationManagers"
            :owner-record="$record"
            :page-class="static::class"
        />
    @endif
</x-filament-panels::page>
