<?php
$config = array(
  // MySQL login details
  "MySQL_host" => "localhost",
  "MySQL_user" => "",
  "MySQL_pass" => "",
  "MySQL_db" => "",
  // Current timezone
  "Timezone" => "Europe/Budapest",
  // Date show type on view page
  "DateShowTypeView" => "F j, Y"
);
date_default_timezone_set($config['Timezone']);
