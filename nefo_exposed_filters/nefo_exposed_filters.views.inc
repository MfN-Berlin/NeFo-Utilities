<?php

/**
 * Implements hook_views_query_alter().
 */
function nefo_exposed_filters_views_query_alter(&$view, &$query) {
  if($view->name == 'nefo_view_list_news' && $view->current_display == 'page') {
    if (!empty($view->exposed_input['ctg']) && $view->exposed_input['ctg'] == 'pressrelease') {
      foreach ($query->where as &$condition_group) {
        foreach ($condition_group['conditions'] as &$condition) {
          if ($condition['field'] == 'field_data_field_nefo_news_category.field_nefo_news_category_tid' &&
              $condition['value'] == 'pressrelease') {
            $condition = array(
                'field' => 'node.type',
                'value' => array('nefo_product_press_release'),
                'operator' => 'in',
            );
            $tables = &$query->get_table_info('field_data_field_nefo_news_category');
            if (isset($tables['join']->type) && $tables['join']->type == 'INNER') {
              $tables['join']->type = 'LEFT';
            }
          }
        }
      }
    }
  }
}
