<?
function aces_get_bonus_parameters($bonus_id)
{
  $bonus_parameters = get_post_meta($bonus_id, 'bonus_parameters', true);
  $parameters = [];
  $bonus_currency = get_field('currency', $bonus_id);

  //////////
  $min_deposit = get_field('min_deposit_variant', $bonus_id);
  if ($min_deposit) {
    $parameters['min_deposit'] = [
      'name' => __('Min. Deposit', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($min_deposit)
    ];
  }
  if ($min_deposit === 'value') {
    $min_deposit = get_field('min_deposit_val', $bonus_id);
    $parameters['min_deposit']['value'] = aces_currency_format($min_deposit, $bonus_currency);
  }
  if ($min_deposit === 'custom') {
    $parameters['min_deposit']['value'] = get_field('min_deposit_txt', $bonus_id);
  }

  //////////
  $max_cashout = get_field('max_cashout_variant', $bonus_id);
  if ($max_cashout) {
    $parameters['max_cashout'] = [
      'name' => __('Max. Cashout', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($max_cashout)
    ];
  }
  if ($max_cashout === 'value') {
    $max_cashout = get_field('max_cashout_val', $bonus_id);
    $parameters['max_cashout']['value'] = aces_currency_format($max_cashout, $bonus_currency);
  }
  if ($max_cashout === 'custom') {
    $parameters['max_cashout']['value'] = get_field('max_cashout_txt', $bonus_id);
  }

  //////////
  $wagering = get_field('wagering_variant', $bonus_id);
  if ($wagering) {
    $parameters['wagering'] = [
      'name' => __('Wagering', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($wagering)
    ];
  }
  if ($wagering === 'value') {
    $wagering = get_field('wagering_val', $bonus_id);
    $parameters['wagering']['value'] = $wagering . 'x';
  }
  if ($wagering === 'custom') {
    $parameters['wagering']['value'] =  get_field('wagering_txt', $bonus_id);
  }

  //////////
  $freespins = get_field('freespins_variant', $bonus_id);
  if ($freespins) {
    $parameters['freespins'] = [
      'name' => __('Free Spins', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($freespins)
    ];
  }
  if ($freespins === 'value') {
    $freespins = get_field('freespins_val', $bonus_id);
    $parameters['freespins']['value'] = $freespins . ' ' . __('FS', 'aces');
  }
  if ($freespins === 'custom') {
    $parameters['freespins']['value'] = get_field('freespins_txt', $bonus_id);
  }

  //////////
  $cash_bonus = get_field('cash_bonus_variant', $bonus_id);
  if ($cash_bonus) {
    $parameters['cash_bonus'] = [
      'name' => __('Cash Bonus', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($cash_bonus)
    ];
  }
  if ($cash_bonus === 'value') {
    $cash_bonus = get_field('cash_bonus_val', $bonus_id);
    $parameters['cash_bonus']['value'] = $cash_bonus . '%';
  }
  if ($cash_bonus === 'custom') {
    $parameters['cash_bonus']['value'] = get_field('cash_bonus_txt', $bonus_id);
  }

  //////////
  $safety_period = get_field('safety_period_variant', $bonus_id);
  if ($safety_period) {
    $parameters['safety_period'] = [
      'name' => __('Safety Period', 'aces'),
      'value' => aces_get_bonus_parameters_value_format($safety_period)
    ];
  }
  if ($safety_period === 'value') {
    $safety_period = get_field('safety_period_val', $bonus_id);
    $parameters['safety_period']['value'] = sprintf(_n('%s day', '%s days', $safety_period), $safety_period);
  }
  if ($safety_period === 'custom') {
    $parameters['safety_period']['value'] = get_field('safety_period_txt', $bonus_id);
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
