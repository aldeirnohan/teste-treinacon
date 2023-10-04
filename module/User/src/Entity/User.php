<?php 
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\User\Repository\UserRepository")
 * @ORM\Table(name="user")
 */

 class User {
    /**
     * @ORM\Id
     * @ORM\Column="id"
     * @ORM\GeneretedValue
     */
    protected $id;

    /**
     * @ORM\Column="name"
     */
    protected $name;

    /**
     * @ORM\Column="email"
     */
    protected $email;

    /**
     * @ORM\Column="password"
     */
    protected $password;

    //getterss and setters

    /**
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email){
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }
 }