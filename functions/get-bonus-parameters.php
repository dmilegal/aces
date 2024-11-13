<?
function aces_get_bonus_parameters($bonus_id)
{
  $bonus_parameters = get_post_meta($bonus_id, 'bonus_parameters', true);
  $parameters = [];
  $bonus_currency = get_field('currency', $bonus_id);

  //////////
  $min_deposit = get_field('min_deposit_text_val', $bonus_id);
  if ($min_deposit) {
    $parameters['min_deposit'] = [
      'name' => __('Min. Deposit', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($min_deposit)
    ];
  }
  if ($min_deposit === 'value') {
    $min_deposit = get_field('min_deposit', $bonus_id);
    $parameters['min_deposit']['value'] = aces_currency_format($min_deposit, $bonus_currency);
  }

  //////////
  $max_cashout = get_field('max_cashout_text_val', $bonus_id);
  if ($max_cashout) {
    $parameters['max_cashout'] = [
      'name' => __('Max. Cashout', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($max_cashout)
    ];
  }
  if ($max_cashout === 'value') {
    $max_cashout = get_field('max_cashout', $bonus_id);
    $parameters['max_cashout']['value'] = aces_currency_format($max_cashout, $bonus_currency);
  }

  //////////
  $wagering = get_field('wagering_text_val', $bonus_id);
  if ($wagering) {
    $parameters['wagering'] = [
      'name' => __('Wagering', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($wagering)
    ];
  }
  if ($wagering === 'value') {
    $wagering = get_field('wagering', $bonus_id);
    $parameters['wagering']['value'] = $wagering . 'x';
  }

  //////////
  $safety_period = get_field('safety_period_text_val', $bonus_id);
  if ($safety_period) {
    $parameters['safety_period'] = [
      'name' => __('Safety Period', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($safety_period)
    ];
  }
  if ($safety_period === 'value') {
    $safety_period = get_field('safety_period', $bonus_id);
    $parameters['safety_period']['value'] = sprintf(_n('%s day', '%s days', $safety_period), $safety_period);
  }

  //////////
  $freespins = get_field('freespins_text_val', $bonus_id);
  if ($freespins) {
    $parameters['freespins'] = [
      'name' => __('Freespins', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($freespins)
    ];
  }
  if ($freespins === 'value') {
    $freespins = get_field('freespins', $bonus_id);
    $parameters['freespins']['value'] = $freespins . ' ' . __('FS', 'aces');
  }


  return $parameters;
}


function aces_get_bonus_parameters_value_format($val)
{
  return match ($val) {
    'no' => __('No', 'aces'),
    'N/A' => __('N/A', 'aces'),
    default => $val
  };
}
