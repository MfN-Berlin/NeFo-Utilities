<?php

// Create a list of node IDs of content type "NeFo-Produkt Pressemitteilung" (nefo_product_press_release)
$file = '/local/apache/nefo/html/sites/all/modules/custom/nefo_utilities/nefo_cmd_tools/press_release_nodes.json';
$press_nodes = array();
$nodes = node_load_multiple(NULL, array('type' => "nefo_product_press_release"));
foreach ($nodes as $nid => $node) {
  $press_nodes[$nid] = array(
      'status' => $node->status,
      'uid' => $node->uid,
      'created' => $node->created,
  );
}
// Storage
$content = json_encode($press_nodes);
file_put_contents($file, $content);

?>