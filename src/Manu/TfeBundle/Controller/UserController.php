<?php

namespace Manu\TfeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Manu\TfeBundle\Entity\User;
use Manu\TfeBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

    public function eleveAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('ManuTfeBundle:Role');
        $role = $repository->findOneByNom('ROLE_USER');
        $entities = $em->getRepository('ManuTfeBundle:User')->findByRole($role);

        return $this->render('ManuTfeBundle:User:eleve.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //Hash password
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);
            $encodedPassword = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
            $entity->setPassword($encodedPassword);
            //Set role
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('ManuTfeBundle:Role');
            $role = $repository->findOneByNom('ROLE_USER');
            $entity->setRole($role);

            $em->persist($entity);
            $em->flush();

            return $this->render('ManuTfeBundle:Default:index.html.twig');
        }

        return $this->render('ManuTfeBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('register_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function registerAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('ManuTfeBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
}
