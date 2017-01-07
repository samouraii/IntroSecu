<?php

namespace Manu\TfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 */
class Question
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $question;

    /**
     * @var string
     */
    private $reponse;

    /**
     * @var \Manu\TfeBundle\Entity\Categorie
     */
    private $categorie;

    public $file;

    //Choice
    /**
     * @var array
     */
    private $choice;

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
     * Set titre
     *
     * @param string $titre
     * @return Question
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set reponse
     *
     * @param string $reponse
     * @return Question
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
     * Set categorie
     *
     * @param \Manu\TfeBundle\Entity\Categorie $categorie
     * @return Question
     */
    public function setCategorie(\Manu\TfeBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Manu\TfeBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
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
     * Add statistiques
     *
     * @param \Manu\TfeBundle\Entity\Statistique $statistiques
     * @return Question
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

    public function __toString()
    {
      return $this->getTitre();
    }
    /**
     * @var \Manu\TfeBundle\Entity\Niveau
     */
    private $niveau;


    /**
     * Set niveau
     *
     * @param \Manu\TfeBundle\Entity\Niveau $niveau
     * @return Question
     */
    public function setNiveau(\Manu\TfeBundle\Entity\Niveau $niveau = null)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \Manu\TfeBundle\Entity\Niveau 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
    /**
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     * @return Question
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    protected function getUploadDir()
    {
        return 'uploads/questions';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
          // do whatever you want to generate a unique name
          $this->image = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
          return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
          unlink($file);
        }
    }

    /**
     * Add choice
     *
     * @param array
     * @return Statistique
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return array
     */
    public function getChoice()
    {
        return $this->choice;
    }
}
