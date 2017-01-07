<?php

namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Manu\TfeBundle\Entity\Niveau;

class LoadNiveauData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $facile = new Niveau();
    $facile->setNom("Facile");
    $moyen = new Niveau();
    $moyen->setNom("Moyen");
    $difficile = new Niveau();
    $difficile->setNom("Difficile");
    $em->persist($facile);
    $em->persist($moyen);
    $em->persist($difficile);
    $em->flush();
    $this->addReference('niveau-facile', $facile);
    $this->addReference('niveau-moyen', $moyen);
    $this->addReference('niveau-difficile', $difficile);
  }

  public function getOrder()
  {
    return 2; // the order in which fixtures will be loaded
  }
}
