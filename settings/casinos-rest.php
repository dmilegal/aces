<?php

/**
 * Rest API
 */
class Aces_Casino_Rest
{
  const namespace = 'aces/v1';
  const casino_list = '/html/casinos';

  public function init()
  {
    register_rest_route(static::namespace, static::casino_list, [
      [
        'methods'  => 'GET',
        'callback' => fn ($d) => $this->get_html_casino_list($d),
        'args'     => $this->get_args(),
      ],
      'schema' => fn () => $this->html_casinos_schema(),
    ]);
  }

  private function get_html_casino_list(WP_REST_Request $request)
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

      $casino_list = $this->build_casino_list($request, $ids);

      foreach ($casino_list as $casino) {
        ob_start();
        get_template_part('aces/casino-card/default', null, [...$casino]);
        $items_html[] = ob_get_contents();
        ob_end_clean();
      }
    }
 
    return [
      'html' => implode('', $items_html),
      'message' => count($items_html) ? __('Find casinos', 'aces') : __('No results', 'aces'),
    ];
  }

  private function get_args()
  {
    $args = [];

    return $args;
  }

  private function html_casinos_schema()
  {
    $schema = array(
      '$schema'              => 'http://json-schema.org/draft-04/schema#',
      'title'                => 'casino list in html format',
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
    $params =$request->get_query_params();

    return $params['query'] ?? [];
  }

  private function build_casino_list(WP_REST_Request $request, $ids)
  {
    $params = $request->get_query_params();
    $full_list = $params['full_list'] ?? [];
    $casino_list = [];
    foreach ($ids as $id) {
      $params = array_values(array_filter($full_list, fn ($c) => $c['casino_id'] == $id));
      $casino_list[] = ['casino_id' => $id, ...($params ? $params[0] : [])];
    }
    
    return $casino_list;
  }
}
