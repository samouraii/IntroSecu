<?php

namespace Manu\TfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistique
 */
class Statistique
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $reponse;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \Manu\TfeBundle\Entity\User
     */
    private $user;

    /**
     * @var \Manu\TfeBundle\Entity\Question
     */
    private $question;

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
     * Set reponse
     *
     * @param string $reponse
     * @return Statistique
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Statistique
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \Manu\TfeBundle\Entity\User $user
     * @return Statistique
     */
    public function setUser(\Manu\TfeBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Manu\TfeBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set question
     *
     * @param \Manu\TfeBundle\Entity\Question $question
     * @return Statistique
     */
    public function setQuestion(\Manu\TfeBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Manu\TfeBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @ORM\PrePersist
     */
    public function setDateValue()
    {
        if(!$this->getDate())
        {
            $this->date = new \DateTime();
        }
    }
}
