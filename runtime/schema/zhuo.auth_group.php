<?php 
return array (
  'id' => 
  array (
    'name' => 'id',
    'type' => 'int(8) unsigned',
    'notnull' => false,
    'default' => NULL,
    'primary' => true,
    'autoinc' => true,
  ),
  'title' => 
  array (
    'name' => 'title',
    'type' => 'char(100)',
    'notnull' => false,
    'default' => '',
    'primary' => false,
    'autoinc' => false,
  ),
  'status' => 
  array (
    'name' => 'status',
    'type' => 'tinyint(1)',
    'notnull' => false,
    'default' => '1',
    'primary' => false,
    'autoinc' => false,
  ),
  'rules' => 
  array (
    'name' => 'rules',
    'type' => 'char(80)',
    'notnull' => false,
    'default' => '',
    'primary' => false,
    'autoinc' => false,
  ),
  'is_delete' => 
  array (
    'name' => 'is_delete',
    'type' => 'tinyint(1)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
);