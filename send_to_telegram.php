<?php
ini_set('display_errors', 1); // Включаем отображение ошибок
error_reporting(E_ALL); // Уровень отчетности о всех ошибках

// Проверка, что форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Ваш Telegram Bot Token (получен через BotFather)
    $botToken = "8048511120:AAFfNEFPH8pNV349g3M-SrXRAAGCtgGBDY8";  // Замените на ваш токен бота
    
    // Ваш chat_id (получен через BotFather)
    $chatId = "325371337";  // Замените на ваш chat_id (можно получить через метод getUpdates)

    // Формируем сообщение для отправки
    $text = "Новое сообщение с сайта!\n\n";
    $text .= "Имя: $name\n";
    $text .= "Email: $email\n";
    $text .= "Сообщение: $message";

    // Формируем URL для отправки запроса к API Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($text);

    // Выводим URL для отладки
    echo "URL: " . $url . "<br>";

    // Выполняем запрос к Telegram API
    $response = file_get_contents($url);

    // Выводим ответ от Telegram API для отладки
    echo "Ответ от Telegram API: " . $response . "<br>";

    // Перенаправление обратно на контактную страницу с параметром success
    header("Location: contact.html?success=true");
    exit();
} else {
    echo "Форма не была отправлена."; // Сообщение, если форма не была отправлена
}
?>
