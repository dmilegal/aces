<?
function aces_get_bonus_parameters($bonus_id)
{
  $bonus_parameters = get_post_meta($bonus_id, 'bonus_parameters', true);
  $parameters = [];
  $bonus_currency = get_field('currency', $bonus_id);
  $min_deposit = get_field('min_deposit', $bonus_id);
  $max_cashout = get_field('max_cashout', $bonus_id);
  $wagering = get_field('wagering', $bonus_id);
  $safety_period = get_field('safety_period', $bonus_id);
  $freespins = get_field('freespins', $bonus_id);

  if ($min_deposit) {
    $parameters['min_deposit'] = [
      'name' => __('Min. Deposit', 'aces'),
      'value' => aces_currency_format($min_deposit, $bonus_currency)
    ];
  }

  if ($max_cashout) {
    $parameters['max_cashout'] = [
      'name' => __('Max. Cashout', 'aces'),
      'value' => aces_currency_format($max_cashout, $bonus_currency)
    ];
  }

  if ($wagering) {
    $parameters['wagering'] = [
      'name' => __('Wagering', 'aces'),
      'value' => $wagering . 'x'
    ];
  }

  if ($safety_period) {
    $parameters['safety_period'] = [
      'name' => __('Safety Period', 'aces'),
      'value' => sprintf(_n('%s day', '%s days', $safety_period), $safety_period)
    ];
  }

  if ($freespins) {
    $parameters['freespins'] = [
      'name' => __('Freespins', 'aces'),
      'value' => $freespins . ' ' . __('FS', 'aces')
    ];
  }

  return $parameters;
}
