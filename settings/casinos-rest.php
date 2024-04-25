<?php

/**
 * Rest API
 */
class Aces_Casino_Rest
{
  const namespace = 'aces/v1';
  const review_list = '/html/reviews';

  public function init()
  {
    register_rest_route(static::namespace, static::review_list, [
      [
        'methods'  => 'GET',
        'callback' => fn ($d) => $this->get_html_review_list($d),
        'args'     => $this->get_args(),
      ],
      'schema' => fn () => $this->html_reviews_schema(),
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
    $params = $request->get_query_params();

    return $params['query'] ?? [];
  }

  private function build_review_list(WP_REST_Request $request, $ids)
  {
    $params = $request->get_query_params();
    $full_list = $params['full_list'] ?? [];
    $review_list = [];
    $card_variant = $params['card_variant'] ?? 'default';
    $post_type = $params['post_type'] ?? 'casino';

    foreach ($ids as $id) {
      $params = array_values(array_filter($full_list, fn ($c) => $c['post_id'] == $id));
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
