<?php
require 'src/render.php';

session_destroy();
echo render('home');
