<?php 
return array (
  'id' => 
  array (
    'name' => 'id',
    'type' => 'int(20)',
    'notnull' => false,
    'default' => NULL,
    'primary' => true,
    'autoinc' => true,
  ),
  'img_id' => 
  array (
    'name' => 'img_id',
    'type' => 'int(20)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'status' => 
  array (
    'name' => 'status',
    'type' => 'int(4)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'article_id' => 
  array (
    'name' => 'article_id',
    'type' => 'int(20)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'delete_time' => 
  array (
    'name' => 'delete_time',
    'type' => 'timestamp',
    'notnull' => false,
    'default' => 'CURRENT_TIMESTAMP',
    'primary' => false,
    'autoinc' => false,
  ),
  'create_time' => 
  array (
    'name' => 'create_time',
    'type' => 'timestamp',
    'notnull' => false,
    'default' => 'CURRENT_TIMESTAMP',
    'primary' => false,
    'autoinc' => false,
  ),
  'update_time' => 
  array (
    'name' => 'update_time',
    'type' => 'timestamp',
    'notnull' => false,
    'default' => 'CURRENT_TIMESTAMP',
    'primary' => false,
    'autoinc' => false,
  ),
);