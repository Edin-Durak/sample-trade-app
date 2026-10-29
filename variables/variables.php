<?php


# Global variables availible everywhere


$uri = parse_url($_SERVER['REQUEST_URI']);

# We only want path value. To avoid additional querry in uri, we'll target only "path" key from this parse_url array
$currentPageUri = $uri['path'];
