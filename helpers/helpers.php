<?php

function getErrorMessage($errors, $key): void
{
    if(isset($errors[$key])) {
        echo "<p class='error'>" . $errors[$key] . "</p>";
    }
}

function isSend(): bool
{
  return isset($_POST['action']) && $_POST['action'] == 'send';
}