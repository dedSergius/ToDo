<?php

return [
    // 
    // Core Config
    // =========================================================================
    "DATABASE_HOST" => "192.168.99.100:3306",
    "DATABASE_NAME" => "db",
    "DATABASE_USERNAME" => "root",
    "DATABASE_PASSWORD" => "secret",
    // 
    // Cookie Config
    // =========================================================================
    "COOKIE_DEFAULT_EXPIRY" => 604800,
    "COOKIE_USER" => "user",
    "" => "",
    // 
    // Session Config
    // =========================================================================
    "SESSION_ERRORS" => "errors",
    "SESSION_FLASH_DANGER" => "danger",
    "SESSION_FLASH_INFO" => "info",
    "SESSION_FLASH_SUCCESS" => "success",
    "SESSION_FLASH_WARNING" => "warning",
    "SESSION_TOKEN" => "token",
    "SESSION_TOKEN_TIME" => "token_time",
    "SESSION_USER" => "user",
    "" => "",
    //
    // Texts Config
    // =========================================================================
    "TEXTS" => [
        //
        // Login Model Texts
        // =====================================================================
        "LOGIN_INVALID_PASSWORD" => "Неправильное имя пользователя или пароль",
        "LOGIN_USER_NOT_FOUND" => "Пользователь с таким именем не найден",
        "" => "",
        //
        // Register Model Texts
        // =====================================================================
        "REGISTER_USER_CREATED" => "Учетная запись успешно создана!",
        "" => "",
        //
        // User Model Texts
        // =====================================================================
        "USER_CREATE_EXCEPTION" => "При создании аккаунта возникла проблема!",
        "USER_UPDATE_EXCEPTION" => "Возникла проблема при обновлении этого аккаунта!",
        "" => "",
        //
        // Input Utility Texts
        // =====================================================================
        "INPUT_INCORRECT_CSRF_TOKEN" => "Не удалось проверить CSRF-токен",
        "" => "",
        //
        // Validate Utility Texts
        // =====================================================================
        "VALIDATE_FILTER_RULE" => "%ITEM% " . "не является действительным" . " %RULE_VALUE%!",
        "VALIDATE_MISSING_INPUT" => "Не удалось проверить" . " %ITEM%!",
        "VALIDATE_MISSING_METHOD" => "Не удалось проверить" . " %ITEM%!",
        "VALIDATE_MATCHES_RULE" => "%RULE_VALUE% " . "Эдолжен соответствовать" . " %ITEM%.",
        "VALIDATE_MAX_CHARACTERS_RULE" => "%ITEM% " . "может быть максимум". " %RULE_VALUE% " ."симловол". ".",
        "VALIDATE_MIN_CHARACTERS_RULE" => "%ITEM% " . "Эможет быть минимум". " %RULE_VALUE% " . "символов" . ".",
        "VALIDATE_REQUIRED_RULE" => "Введите" . " %ITEM%",
        "VALIDATE_UNIQUE_RULE" => "%ITEM% " . "уже используется" . ".",



        "VALIDATE_EMAIL" => "Email",
        "VALIDATE_USERNAME" => "Имя пользователя",
        "VALIDATE_TEXT" => "Текст задачи",
        "VALIDATE_PASSWORD" => "пароль",],
    "" => "",
];
