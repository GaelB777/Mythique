<?php
    if (! empty($_SESSION['Email']) && ! empty($_SESSION['id']))
    {
        header('Location: ./account');
        exit();
    }
