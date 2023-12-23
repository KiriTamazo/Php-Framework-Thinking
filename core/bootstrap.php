<?php

// require 'core/database/Connection.php';
// require 'core/database/QueryBuilder.php';
// require 'core/Router.php';
// require 'core/Request.php';

use core\App;

require 'core/functions.php';
// $config = require 'config.php';
// $query = new QueryBuilder(Connection::make($config['database']));

App::bind('config', require 'config.php');
App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));
