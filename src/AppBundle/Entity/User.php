<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $usernameCanonical;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $emailCanonical;

    /**
     * @var boolean
     */
    protected $enabled;

    /**
     * The salt to use for hashing
     *
     * @var string
     */
    protected $salt;

    /**
     * Encrypted password. Must be persisted.
     *
     * @var string
     */
    protected $password;

    /**
     * Plain password. Used for model validation. Must not be persisted.
     *
     * @var string
     */
    protected $plainPassword;


    public function __construct()
    {
        parent::__construct();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Gets the encrypted password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;

        return $this;
    }

}