$webhookurl = "Вебхук канала, в который будет отправлено сообщений. см. https://www.youtube.com/watch?v=Ck-Gjn-nWsg ";

// Декорация "даты и времени"
$timestamp = date("c", strtotime("now")); 

$json_data = json_encode([
    // Сообщение
//    "content" => "Сообщение которое будет отправлено в канал",
    // "url" => "ссылка",
    "username" => "Сюда имя отправителя",

    // URL аватара.
//    "avatar_url" => "URL",

    // TTS - читайте доки дискорда, советуется быть выключенным
    "tts" => false,

    // Если нужно - файл для загрузки
    // "file" => "",

    // Массив для EMBED - советуется у изучению
    "embeds" => [
        [
            // Загловок EMBED
            "title" => "ЗАГОЛОВОК",

            // Тип EMBED - читайте доки, рекомендуется оставлять RICH
            "type" => "rich",

            // Описание EMBED
//            "description" => "В основном бесполезно",

            // URL заголовка
//            "url" => " URL ",

            // ШТАМП времени отформатирован как ISO8601
            "timestamp" => $timestamp,

            // Цвет полоски в Embed, указан в HEX Формате
            "color" => hexdec( "00ff00" ),

            // нижний колонтитул(сноска)
            "footer" => [
                "text" => "ТЕКСТ",
//                "icon_url" => "ссылка"
            ],

            // Прикреплённая картинка
//            "image" => [
//                "url" => "url"
//            ],

            // Картина справа
            "thumbnail" => [
                "url" => "Url"
            ],

            // автор
            "author" => [
                "name" => "ИМЯ",
                "url" => "url автора"
            ],

            // Доп. поля 
            "fields" => [
                // Поле 1
                [
                    "name" => "Имя поля",
                    "value" => "значение",
                    "inline" => false  // Читайте доки о EMBED
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// ЕСЛИ ВОЗНИКАЮТ ПРОБЛЕМЫ - РАСКОММЕНТИРУЙТЕ СЛЕДУЮЩУЮ СТРОКУ
// echo $response;
curl_close( $ch );



// ПЕРЕВОД СДЕЛАН МНОЮ, ОРИГИНАЛ https://gist.github.com/Mo45/cb0813cb8a6ebcd6524f6a36d4f8862c , желательно к ознакомлению и прочтению данного материала
