<?php
require_once 'src/Dao/php-activerecord/ActiveRecord.php';
require_once 'php-activerecord/ActiveRecord.php';

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory('app/models/');
$cfg->set_connections(array('development' => 
    'mysql://root:@localhost/sistemahx'));
