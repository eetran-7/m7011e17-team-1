<?php
session_start();

// Destroying all sessions
if(session_destroy()) {

    // Redirecting To Home Page
    header("Location: https://cloud-75.skelabb.ltu.se"); 
}
?>
