<?php

require './variables/variables.php';
require './functions/functions.php';


# For now, we will import controllers/index.php file
# Routing will be dynamic soon

require './controllers/index.php';

dd($currentPageUri);
