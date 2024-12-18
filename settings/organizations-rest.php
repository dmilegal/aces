<?php

/**
 * Rest API
 */
class Aces_Organization_Rest
{
  const namespace = 'aces/v1';
  const review_list = '/html/reviews';

  public function init()
  {
    register_rest_route(static::namespace, static::review_list, [
      [
        'methods'  => 'POST',
        'callback' => fn($d) => $this->get_html_review_list($d),
        'args'     => $this->get_args(),
        'permission_callback' => '__return_true'
      ],
      'schema' => fn() => $this->html_reviews_schema(),
    ]);
  }

  private function get_html_review_list(WP_REST_Request $request)
  {
    $query = $this->build_query($request);
    $items_html = [];

    if ($query->have_posts()) {
      $ids = [];
      while ($query->have_posts()) {
        $query->the_post();
        $ids[] = get_the_ID();
      }

      wp_reset_postdata();

      $review_list = $this->build_review_list($request, $ids);

      foreach ($review_list as $review) {
        ob_start();
        get_template_part('aces/review-card/default', null, $review);
        $items_html[] = ob_get_contents();
        ob_end_clean();
      }
    }

    return [
      'html' => implode('', $items_html),
      'message' => count($items_html) ? __('Find reviews', 'aces') : __('No results', 'aces'),
      'page' => $query->query_vars['paged'] ?? 1,
      'total_pages' => $query->max_num_pages,
    ];
  }

  private function get_args()
  {
    $args = [];

    return $args;
  }

  private function html_reviews_schema()
  {
    $schema = array(
      '$schema'              => 'http://json-schema.org/draft-04/schema#',
      'title'                => 'review list in html format',
      'type'                 => 'object',
      'properties'           => array(
        'html' => array(
          'type'                 => 'string',
        ),
        'message' => array(
          'type'                 => 'string',
        ),
      )
    );


    return $schema;
  }


  private function build_query(WP_REST_Request $request)
  {
    return new WP_Query($this->build_query_args($request));
  }

  private function build_query_posts(WP_REST_Request $request)
  {

    return (new WP_Query)->query($this->build_query_args($request));
  }

  private function build_query_args(WP_REST_Request $request)
  {
    $params = $request->get_params();

    $query = $this->prepare_filter($params['query'] ?? [], $params['full_list'] ?? [], $params['filter'] ?? []);

    return $query;
  }

  private function prepare_filter($query, $full_list, $filter)
  {
    if (empty($filter)) {
      return $query;
    }

    $filter_bonus_cats = array_filter($filter['bonus_categories'] ?? [], fn($i) => !!$i);

    if ($filter_bonus_cats) {
      $query['post__in'] = array_filter($query['post__in'], function ($id) use ($filter_bonus_cats, $full_list) {
        $params_arr = array_values(array_filter($full_list, fn($c) => $c['post_id'] == $id));
        $params = $params_arr ? $params_arr[0] : [];
        
        $item_bonus_categories = $params['bonus_category'] ?? [];
        $bonus_id = aces_get_casino_bonus_id($id, $item_bonus_categories);
        $bonus_cats = aces_get_bonus_categories($bonus_id);

        $has_cat = false;
        foreach ($bonus_cats as $bonus_cat) {
          if (in_array($bonus_cat->term_id, $filter_bonus_cats)) {
            $has_cat = true;
            break;
          }
        }
        return $has_cat;
      });
    }

    return $query;
  }

  private function build_review_list(WP_REST_Request $request, $ids)
  {
    $params = $request->get_params();
    $full_list = $params['full_list'] ?? [];
    $review_list = [];
    $card_variant = $params['card_variant'] ?? 'default';
    $post_type = $params['post_type'] ?? 'casino';

    foreach ($ids as $id) {
      $params = array_values(array_filter($full_list, fn($c) => $c['post_id'] == $id));
      $review_list[] = [
        'post_id' => $id,
        'card_variant' => $card_variant,
        'post_type' => $post_type,
        ...($params ? $params[0] : [])
      ];
    }

    return $review_list;
  }
}
