<?php

// Set term reference to "NeFo-Pressemitteilung" (tid: 75)
$file_nodes = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/press_release_nodes.json';
$press_nodes = json_decode(file_get_contents($file_nodes), TRUE);
// Update nodes
foreach ($press_nodes as $nid => $node) {
  $node_wrapper = entity_metadata_wrapper('node', $nid);
  $node_wrapper->field_nefo_news_category = 75;
  $node_wrapper->save();
}

?>