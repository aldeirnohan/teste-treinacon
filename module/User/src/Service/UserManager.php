<?php 

namespace User\Service;

use User\Entity\User;

class UserManager{

    /**
     * constructor here
     */
    public function __construct($entityManager){
        $this->entityManager = $entityManager;
    }

    public function addNewUser($data){
        $user = new User();

        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword(md5($data['password']));

        $this->entityManager->persist($user)/
        $this->entityManager->flush();
    }    

    public function updateUser($user, $data){

        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword(md5($data['password']));

        $this->entityManager->flush();
    }    

    public function deleteUser($user){

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }    
}

