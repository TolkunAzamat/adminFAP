<?php
session_start();

// Проверяем, если сессия пользователя активна
if (isset($_SESSION['last_activity'])) {
    // Время бездействия в секундах (10 минут)
    $inactive_timeout = 600;

    // Разница между текущим временем и последней активностью пользователя
    $elapsed_time = time() - $_SESSION['last_activity'];

    // Если время бездействия превышает указанный интервал
    if ($elapsed_time > $inactive_timeout) {
        // Уничтожаем сессию пользователя
        session_destroy();

        // Перенаправляем на страницу входа
        header("Location: login.blade.php");
        exit();
    }
}

// Обновляем время последней активности пользователя
$_SESSION['last_activity'] = time();
?>
