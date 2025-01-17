<?

function aces_get_locale_for_currency($currencyCode) {
  $locales = [
      'USD' => 'en_US',
      'EUR' => 'de_DE',
      'JPY' => 'ja_JP',
      'GBP' => 'en_GB',
      'AUD' => 'en_AU',
      'CAD' => 'en_CA',
      'CHF' => 'de_CH',
      'CNY' => 'zh_CN',
      'SEK' => 'sv_SE',
      'NZD' => 'en_NZ',
      'MXN' => 'es_MX',
      'SGD' => 'en_SG',
      'HKD' => 'zh_HK',
      'NOK' => 'nb_NO',
      'KRW' => 'ko_KR',
      'TRY' => 'tr_TR',
      'INR' => 'hi_IN',
      'BRL' => 'pt_BR',
      'ZAR' => 'en_ZA',
      'RUB' => 'ru_RU',
      'PLN' => 'pl_PL',
      'THB' => 'th_TH',
      'IDR' => 'id_ID',
      'HUF' => 'hu_HU',
      'CZK' => 'cs_CZ',
      'ILS' => 'he_IL',
      'CLP' => 'es_CL',
      'PHP' => 'en_PH',
      'AED' => 'ar_AE',
      'SAR' => 'ar_SA',
      'MYR' => 'ms_MY',
      'RON' => 'ro_RO',
      'BGN' => 'bg_BG',
      'DKK' => 'da_DK',
      'HRK' => 'hr_HR',
      'PKR' => 'ur_PK',
      'EGP' => 'ar_EG',
      'NGN' => 'en_NG',
      'COP' => 'es_CO',
      'VND' => 'vi_VN'
  ];

  return $locales[$currencyCode] ?? 'en_US';
}

function aces_currency_format($amount, $currencyCode = 'USD')
{
  if (!$amount) return '';
  $locale = aces_get_locale_for_currency($currencyCode);
  $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
  $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
  $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
  return $formatter->formatCurrency($amount, $currencyCode ?? 'USD');
}