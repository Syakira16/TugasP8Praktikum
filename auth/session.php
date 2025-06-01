<?php

session_start();

   function login() {
        return isset($_SESSION['id']);
    }

    function getuserlevel() {
        return $_SESSION['level'] ?? null;
    }

    function getUsername() {
        return $_SESSION['username'] ?? '';
    }

?>
