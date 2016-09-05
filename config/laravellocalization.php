<?php

return [

    // Uncomment the languages that your site supports - or add new ones.
    // These are sorted by the native name, which is the order you might show them in a language selector.
    // Regional languages are sorted by their base language, so "British English" sorts as "English, British"
    'supportedLocales' => [
        'rastatt' => ['name' => 'Rastatt', 'script' => 'Latn', 'native' => 'Deutsch', 'regional' => 'de_DE'],
        'baden-baden' => ['name' => 'Baden-Baden', 'script' => 'Latn', 'native' => 'Deutsch', 'regional' => 'de_DE'],
        'karlsruhe' => ['name' => 'Baden-Baden', 'script' => 'Latn', 'native' => 'Deutsch', 'regional' => 'de_DE'],
    ],

    // Negotiate for the user locale using the Accept-Language header if it's not defined in the URL?
    // If false, system will take app.php locale attribute
    'useAcceptLanguageHeader' => true,

    // If LaravelLocalizationRedirectFilter is active and hideDefaultLocaleInURL
    // is true, the url would not have the default application language
    //
    // IMPORTANT - When hideDefaultLocaleInURL is set to true, the unlocalized root is treated as the applications default locale "app.locale".
    // Because of this language negotiation using the Accept-Language header will NEVER occur when hideDefaultLocaleInURL is true.
    //
    'hideDefaultLocaleInURL' => false,

];
