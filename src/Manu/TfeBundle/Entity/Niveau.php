<?php

namespace Manu\TfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Niveau
 */
class Niveau
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Niveau
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add questions
     *
     * @param \Manu\TfeBundle\Entity\Question $questions
     * @return Niveau
     */
    public function addQuestion(\Manu\TfeBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Manu\TfeBundle\Entity\Question $questions
     */
    public function removeQuestion(\Manu\TfeBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __toString()
    {
      return $this->getNom();
    }
}
