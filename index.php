<?php
require 'includes/functions.inc.php';

// Here we include proper page content
if (isset($_GET['page']))
    load_page($_GET['page']);
else
    load_page('index');
