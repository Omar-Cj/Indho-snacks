<?php return array (
  'beyondcode/laravel-dump-server' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\DumpServer\\DumpServerServiceProvider',
    ),
  ),
  'cartalyst/sentinel' => 
  array (
    'providers' => 
    array (
      0 => 'Cartalyst\\Sentinel\\Laravel\\SentinelServiceProvider',
    ),
    'aliases' => 
    array (
      'Activation' => 'Cartalyst\\Sentinel\\Laravel\\Facades\\Activation',
      'Reminder' => 'Cartalyst\\Sentinel\\Laravel\\Facades\\Reminder',
      'Sentinel' => 'Cartalyst\\Sentinel\\Laravel\\Facades\\Sentinel',
    ),
  ),
  'darryldecode/cart' => 
  array (
    'providers' => 
    array (
      0 => 'Darryldecode\\Cart\\CartServiceProvider',
    ),
    'aliases' => 
    array (
      'Cart' => 'Darryldecode\\Cart\\Facades\\CartFacade',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'jorenvanhocht/laravel-share' => 
  array (
    'providers' => 
    array (
      0 => 'Jorenvh\\Share\\Providers\\ShareServiceProvider',
    ),
    'aliases' => 
    array (
      'Share' => 'Jorenvh\\Share\\ShareFacade',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'masterro/laravel-xss-filter' => 
  array (
    'providers' => 
    array (
      0 => 'MasterRO\\LaravelXSSFilter\\XSSFilterServiceProvider',
    ),
    'aliases' => 
    array (
      'XSSCleaner' => 'MasterRO\\LaravelXSSFilter\\XSSCleanerFacade',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'spatie/laravel-cookie-consent' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\CookieConsent\\CookieConsentServiceProvider',
    ),
  ),
  'yajra/laravel-datatables-oracle' => 
  array (
    'providers' => 
    array (
      0 => 'Yajra\\DataTables\\DataTablesServiceProvider',
    ),
    'aliases' => 
    array (
      'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
    ),
  ),
);