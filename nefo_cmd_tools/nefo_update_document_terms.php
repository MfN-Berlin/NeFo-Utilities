<?php

/**
 * NeFo-Produkt Bericht
 */
$source_node_type = 'nefo_product_report';
$category_tid = 79;
$backup_file = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/'. $source_node_type .'.json';

$backup_nodes = json_decode(file_get_contents($backup_file), TRUE);
foreach ($backup_nodes as $nid => $backup_node) {
  $node_wrapper = entity_metadata_wrapper('node', $nid);
  $node_wrapper->field_nefo_taxonomy_document = $category_tid;
  $node_wrapper->save();
  $current_alias =  drupal_get_path_alias('node/'. $nid);
  if ($current_alias !== $backup_node['alias']) {
    $path = array('source' => "node/$nid", 'alias' => $backup_node['alias']);
    path_save($path);
  }
}

/**
 * NeFo-Produkt Faktenblatt
 */
$source_node_type = 'nefo_product_factsheet';
$category_tid = 76;
$backup_file = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/'. $source_node_type .'.json';

$backup_nodes = json_decode(file_get_contents($backup_file), TRUE);
foreach ($backup_nodes as $nid => $backup_node) {
  $node_wrapper = entity_metadata_wrapper('node', $nid);
  $node_wrapper->field_nefo_taxonomy_document = $category_tid;
  $node_wrapper->save();
  $current_alias =  drupal_get_path_alias('node/'. $nid);
  if ($current_alias !== $backup_node['alias']) {
    $path = array('source' => "node/$nid", 'alias' => $backup_node['alias']);
    path_save($path);
  }
}

/**
 * NeFo-Produkt Stellungnahme
 */
$source_node_type = 'nefo_product_opinion';
$category_tid = 77;
$backup_file = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/'. $source_node_type .'.json';

$backup_nodes = json_decode(file_get_contents($backup_file), TRUE);
foreach ($backup_nodes as $nid => $backup_node) {
  $node_wrapper = entity_metadata_wrapper('node', $nid);
  $node_wrapper->field_nefo_taxonomy_document = $category_tid;
  $node_wrapper->save();
  $current_alias =  drupal_get_path_alias('node/'. $nid);
  if ($current_alias !== $backup_node['alias']) {
    $path = array('source' => "node/$nid", 'alias' => $backup_node['alias']);
    path_save($path);
  }
}

/**
 * NeFo-Produkt Studie
 */
$source_node_type = 'nefo_product_study';
$category_tid = 78;
$backup_file = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/'. $source_node_type .'.json';

$backup_nodes = json_decode(file_get_contents($backup_file), TRUE);
foreach ($backup_nodes as $nid => $backup_node) {
  $node_wrapper = entity_metadata_wrapper('node', $nid);
  $node_wrapper->field_nefo_taxonomy_document = $category_tid;
  $node_wrapper->save();
  $current_alias =  drupal_get_path_alias('node/'. $nid);
  if ($current_alias !== $backup_node['alias']) {
    $path = array('source' => "node/$nid", 'alias' => $backup_node['alias']);
    path_save($path);
  }
}

?>