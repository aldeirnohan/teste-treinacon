<?php

declare(strict_types=1);

namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use User\Entity\User;
use User\Form\UserForm;

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
        $form = new UserForm();
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $user = new User();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                
                return $this->redirect()->toRoute('user');
            }
        }
        
        return new ViewModel([
            'form' => $form,
        ]);
    }

    public function editAction(){
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if ($id === 0) {
            return $this->redirect()->toRoute('user');
        }
        
        $user = $this->entityManager->getRepository(User::class)->find($id);
        
        if ($user === null) {
            return $this->redirect()->toRoute('user');
        }
        
        $form = new UserForm();
        $form->bind($user);
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $this->entityManager->flush();
                
                return $this->redirect()->toRoute('user');
            }
        }
        
        return new ViewModel([
            'user' => $user,
            'form' => $form,
        ]);
    }

    public function removeAction(){
        $id = (int) $this->params()->fromRoute('id', 0);

        if ($id === 0) {
            return $this->redirect()->toRoute('home');
        }

        $user = $this->entityManager->getRepository(User::class)->find($id);

        if ($user === null) {
            return $this->redirect()->toRoute('home');
        }

        if ($this->getRequest()->isPost()) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel([
            'id' => $id,
        ]);
    }
}