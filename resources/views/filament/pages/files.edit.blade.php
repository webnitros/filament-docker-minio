<x-filament-panels::page>

    <div class="flex items-center gap-x-3">
        <div class="flex-1">

            <button wire:click="$dispatch('filament-tour::open-highlight', 'title')">Show title highlight</button>


            <br>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css">
            <h1>Виджет для сайта</h1>

            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                {{ \Composer\InstalledVersions::getPrettyVersion('filament/filament') }}
            </p>

            <h1 class="fi-header-heading text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-1xl"></h1>
            <p>Код для подключения виджета который будет получаеть ссылки для сайта</p>
            <br>
            <small>
                <pre>
<code id="widjet" class="javascript language-javascript">
    // Функция для отправки POST-запроса
    function sendPostRequest (url, data, callback) {
        var xhr = new XMLHttpRequest()
        xhr.open('POST', url, true)
        xhr.setRequestHeader('Content-Type', 'application/json')
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                callback(xhr)
            }
        }
        xhr.send(JSON.stringify(data))
    }

    // Функция для загрузки виджета
    function loadWidget (domain, callback) {
        // Выполняем запрос после загрузки виджета
        var url = 'https://s3files.massive.ru/api/link'
        var data = {domain: domain}
        sendPostRequest(url, data, callback)
    }

    // Callback функция для обработки ответа
    function handleResponse (response) {
        // Здесь можно выполнить нужные действия с полученным ответом
        document.body.innerText = response.responseText
    }

    // Загружаем виджет и передаем callback функцию
    loadWidget('artelamp.ru', handleResponse)
 </code></pre>
            </small>
        </div>


    </div>


</x-filament-panels::page>
