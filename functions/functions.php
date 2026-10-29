<?php

# Simple dump and die function for debugging

function dd($value)
{

    echo '<pre>';
    var_dump($value);
    echo '<pre>';

    die();
}
