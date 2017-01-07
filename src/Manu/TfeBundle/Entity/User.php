<?php

namespace Manu\TfeBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $statistiques;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->statistiques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add statistiques
     *
     * @param \Manu\TfeBundle\Entity\Statistique $statistiques
     * @return User
     */
    public function addStatistique(\Manu\TfeBundle\Entity\Statistique $statistiques)
    {
        $this->statistiques[] = $statistiques;

        return $this;
    }

    /**
     * Remove statistiques
     *
     * @param \Manu\TfeBundle\Entity\Statistique $statistiques
     */
    public function removeStatistique(\Manu\TfeBundle\Entity\Statistique $statistiques)
    {
        $this->statistiques->removeElement($statistiques);
    }

    /**
     * Get statistiques
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatistiques()
    {
        return $this->statistiques;
    }

    public function getRoles()
    {
        return array($this->role->getNom());
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->getUsername();
    }
    /**
     * @var \Manu\TfeBundle\Entity\Role
     */
    private $role;


    /**
     * Set role
     *
     * @param \Manu\TfeBundle\Entity\Role $role
     * @return User
     */
    public function setRole(\Manu\TfeBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Manu\TfeBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    public function __toString()
    {
      return $this->getUserName();
    }


    public function getPoint()
    {
        $i = 0;
        foreach ($this->statistiques as $statistique)
        {
            if ($statistique->getReponse() == $statistique->getQuestion()->getReponse())
            {
                $i = $i + 1;
            }
        }
        $total = count($this->statistiques);
        $result = "".$i."/".$total;
        return $result;
    }
}
