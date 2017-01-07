<?php

namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Manu\TfeBundle\Entity\Categorie;

class LoadCategorieData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $ospf = new Categorie();
    $ospf->setNom("OSPF");
    $ospf->setCustom(1);
    $stp = new Categorie();
    $stp->setNom("STP");
    $stp->setCustom(1);
    $em->persist($ospf);
    $em->persist($stp);
    $em->flush();
    $this->addReference('categorie-ospf', $ospf);
    $this->addReference('categorie-stp', $stp);
  }

  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
}
