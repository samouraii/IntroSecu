<?php

namespace Manu\TfeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Manu\TfeBundle\Entity\Statistique;
use Manu\TfeBundle\Form\StatistiqueType;

/**
 * Statistique controller.
 *
 */
class StatistiqueController extends Controller
{

    /**
     * Lists all Statistique entities.
     *
     */
    public function indexAction(Request $request)
    {
        $usr= $this->get('security.context')->getToken()->getUser();
        $id = $usr->getId();

        $em = $this->getDoctrine()->getManager();
        $qb = $em->getRepository('ManuTfeBundle:Statistique')->createQueryBuilder('a');
        $qb->join('a.question', 'q');
        if (!$usr->getRole()->getNom() == 'ROLE_ADMIN')
        {
            $qb->where('a.user = :id')->setParameter('id', $id);
        }
        $filterForm = $this->createFilterForm();
        $filterForm->handleRequest($request);
        if ($filterForm->isValid())
        {
            $data = $filterForm->getData();
            $choice = $data['choice'];
            switch($choice)
            {
                case 'categorie':
                    $qb->addOrderBy('q.categorie', 'asc');
                    break;
                case 'question':
                    $qb->addOrderBy('a.question', 'asc');
                    break;
                case 'user':
                    $qb->addOrderBy('a.user', 'asc');
                    break;
            }
        }
        $entities = $qb->getQuery()->getResult();
        return $this->render('ManuTfeBundle:Statistique:index.html.twig', array(
            'entities' => $entities,
            'user' => $usr,
            'filter_form' => $filterForm->createView(),
        ));
    }

    private function createFilterForm()
    {
        return $this->createFormBuilder()
            ->add('choice', 'choice', array(
                'label' => 'Filtrer par:',
                'choices' => array('categorie' => 'Catégorie',
                                   'question' => 'Question',
                                   'user' => 'Utilisateur')))
            ->add('submit', 'submit', array('label' => 'Filtrer'))
            ->getForm()
        ;
    }

    /**
     * Creates a new Statistique entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Statistique();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('manu_statistique_show', array('id' => $entity->getId())));
        }

        return $this->render('ManuTfeBundle:Statistique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Statistique entity.
     *
     * @param Statistique $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Statistique $entity)
    {
        $form = $this->createForm(new StatistiqueType(), $entity, array(
            'em' => $this->getDoctrine()->getManager(),
            'action' => $this->generateUrl('manu_statistique_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Statistique entity.
     *
     */
    public function newAction()
    {
        $entity = new Statistique();
        $form   = $this->createCreateForm($entity);

        return $this->render('ManuTfeBundle:Statistique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Statistique entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ManuTfeBundle:Statistique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statistique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ManuTfeBundle:Statistique:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Statistique entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ManuTfeBundle:Statistique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statistique entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ManuTfeBundle:Statistique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Statistique entity.
    *
    * @param Statistique $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Statistique $entity)
    {
        $form = $this->createForm(new StatistiqueType(), $entity, array(
            'em' => $this->getDoctrine()->getManager(),
            'action' => $this->generateUrl('manu_statistique_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Statistique entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ManuTfeBundle:Statistique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statistique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('manu_statistique_edit', array('id' => $id)));
        }

        return $this->render('ManuTfeBundle:Statistique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Statistique entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ManuTfeBundle:Statistique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Statistique entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('manu_statistique'));
    }

    /**
     * Creates a form to delete a Statistique entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manu_statistique_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
