<?php

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Laminas\Cache',
    'Laminas\Form',
    'Laminas\Hydrator',
    'Laminas\InputFilter',
    'Laminas\Filter',
    'Laminas\Paginator',
    'Laminas\Router',
    'Laminas\Validator',
    'DoctrineModule',
    'Laminas\Cache\Storage\Adapter\Filesystem',
    'Laminas\Cache\Storage\Adapter\Memory',
    'DoctrineORMModule',
    'Application',
    'User',
];
