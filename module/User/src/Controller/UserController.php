<?php

declare(strict_types=1);

namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use User\Entity\User;


class UserController extends AbstractActionController
{
    /**
     * Entity manager
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * manager
     * @var User\Service\UserManager
     */
    private $userManager;

    /**
     * Contructor
     */
    public function __construct($entityManager, $userManager){
        $this->$entityManager = $entityManager;
        $this->$userManager = $userManager;
    }

    public function indexAction(){
        $users = $this->entityManager->getRepository(User::class)->findAll();

        return new ViewModel([
            'users' => $users
        ]);
    }

    public function addAction(){
        return new ViewModel();
    }

    public function editAction(){
        return new ViewModel();
    }

    public function removeAction(){
        return new ViewModel();
    }
}