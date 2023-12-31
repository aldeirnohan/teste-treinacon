<?php

namespace User\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Controller\UserController;
use User\Service\UserManager;

class UserControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        $entityManager = $container->get('doctrine.entitymanager.orm_default');

        $userManager = $container->get(UserManager::class);

        return new UserController($entityManager, $userManager);

    }
}

