<?php

use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Sonata\PageBundle\Request\RequestFactory; # before: use Symfony\Component\HttpFoundation\Request;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

/*
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
*/


return function (array $context) {
   // print_r($context);
    //die();
    //return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
        
    if ($context['APP_DEBUG' ]) {
        umask(0000);

        Debug::enable();
    }

    if ($trustedProxies = $context['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
        Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
    }

    if ($trustedHosts = $context['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
        Request::setTrustedHosts([$trustedHosts]);
    }

    $kernel = new Kernel($context['APP_ENV'], (bool)  $context['APP_DEBUG']);
    $request = RequestFactory::createFromGlobals('host'); // before: $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
   return $kernel->terminate($request, $response);

};
