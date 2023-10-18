<?php


session_start();


function is_auth(): bool
{
    return !!($_SESSION['user_id'] ?? false);
}
