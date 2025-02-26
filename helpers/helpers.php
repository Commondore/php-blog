<?php

function getErrorMessage($errors, $key): void
{
    if(isset($errors[$key])) {
        echo "<p class='error'>" . $errors[$key] . "</p>";
    }
}