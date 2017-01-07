<?php

namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Manu\TfeBundle\Entity\Role;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $admin = new Role();
    $admin->setNom("ROLE_ADMIN");
    $user = new Role();
    $user->setNom("ROLE_USER");
    $em->persist($admin);
    $em->persist($user);
    $em->flush();
    $this->addReference('role-admin', $admin);
    $this->addReference('role-user', $user);
  }

  public function getOrder()
  {
    return 3; // the order in which fixtures will be loaded
  }
}
