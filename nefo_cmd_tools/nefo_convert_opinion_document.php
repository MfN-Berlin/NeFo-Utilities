<?php
/**
 * NeFo-Produkt Stellungnahme
 */
$source_node_type = 'nefo_product_opinion';
$category_tid = 78;
$backup_file = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/'. $source_node_type .'.json';

$dest_node_type = 'nefo_product_document';
$no_fields_flag = FALSE;
$hook_options = NULL;
$dest_fields = array();
$dest_fields[0] = 'field_nefo_product_document';
$dest_fields[1] = 'field_nefo_description';
$dest_fields[2] = 'field_nefo_product_icon';
$dest_fields[3] = 'field_nefo_taxonomy_tags';

// Create backup
$backup_nodes = array();
$nodes = node_load_multiple(NULL, array('type' => $source_node_type));
foreach ($nodes as $nid => $node) {
  $backup_nodes[$nid] = array(
      'status' => $node->status,
      'uid' => $node->uid,
      'created' => $node->created,
      'alias' => drupal_get_path_alias('node/'. $nid),
  );
}
$content = json_encode($backup_nodes);
file_put_contents($backup_file, $content);

// Convert nodes
$source_fields= $dest_fields;
$source_fields[0] = 'field_nefo_opinion';
$nodes = node_load_multiple(NULL, array('type' => $source_node_type));
foreach ($nodes as $nid => $node) {
  $result = node_convert_node_convert($nid, $dest_node_type, $source_fields, $dest_fields, $no_fields_flag, $hook_options);
  node_convert_messages($result, array('nid' => $nid));
  $node_wrapper = entity_metadata_wrapper('node', $nid);
  $node_wrapper->field_nefo_product_field_type = 'PDF-Datei';
  $node_wrapper->field_nefo_taxonomy_document = $category_tid;
  $node_wrapper->save();
}

// Path alias
$backup_nodes = json_decode(file_get_contents($backup_file), TRUE);
foreach ($backup_nodes as $nid => $backup_node) {
  $current_alias =  drupal_get_path_alias('node/'. $nid);
  if ($current_alias !== $backup_node['alias']) {
    $path = array('source' => "node/$nid", 'alias' => $backup_node['alias']);
    path_save($path);
  }
}

?>