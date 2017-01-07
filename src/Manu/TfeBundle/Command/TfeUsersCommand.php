<?php
namespace Manu\TfeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Manu\TfeBundle\Entity\User;

class TfeUsersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('manu:tfe:users')
            ->setDescription('Add Tfe users')
            ->addArgument('username', InputArgument::REQUIRED, 'The username')
            ->addArgument('password', InputArgument::REQUIRED, 'The password')
            ->addArgument('role', InputArgument::REQUIRED, 'The role')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $nomRole = $input->getArgument('role');

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $user = new User();
        $user->setUsername($username);
        // encode the password
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
        $doctrine = $this->getContainer()->get("doctrine");
        $em = $doctrine->getEntityManager();
        $repository = $em->getRepository('ManuTfeBundle:Role');
        $role = $repository->findOneByNom($nomRole);
        $user->setRole($role);
        $em->persist($user);
        $em->flush();

        $output->writeln(sprintf('Added %s user with password %s', $username, $password));
    }
}
