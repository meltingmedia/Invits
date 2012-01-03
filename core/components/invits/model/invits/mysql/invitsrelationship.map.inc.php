<?php
/**
 * @package invits
 */
$xpdo_meta_map['InvitsRelationship']= array (
  'package' => 'invits',
  'table' => 'invits_relationships',
  'fields' => 
  array (
    'sender_id' => 0,
    'invited_id' => 0,
  ),
  'fieldMeta' => 
  array (
    'sender_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'pk',
    ),
    'invited_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'pk',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 
    array (
      'alias' => 'PRIMARY',
      'primary' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'sender_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'invited_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'aggregates' => 
  array (
    'Sender' => 
    array (
      'class' => 'modUser',
      'key' => 'id',
      'local' => 'sender_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Invited' => 
    array (
      'class' => 'modUser',
      'key' => 'id',
      'local' => 'invited_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
