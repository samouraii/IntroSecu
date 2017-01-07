<?php

namespace Manu\TfeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Manu\TfeBundle\Entity\Question;
use Manu\TfeBundle\Form\QuestionType;
use Manu\TfeBundle\Form\QuestionSearchType;

use Manu\TfeBundle\Entity\Statistique;
use Manu\TfeBundle\Form\StatistiqueType;

/**
 * Question controller.
 *
 */
class QuestionController extends Controller
{

    /**
     * Lists all Question entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ManuTfeBundle:Question')->findAll();

        return $this->render('ManuTfeBundle:Question:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Search Question entities.
     *
     */
    public function searchAction(Request $request)
    {
        $form = $this->get('form.factory')->create(new QuestionSearchType());

        $form->add('submit', 'submit', array('label' => 'Générer un exercice'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->randomAction($request);
        }

        return $this->render('ManuTfeBundle:Question:search.html.twig', array(
            'form'   => $form->createView(),
        ));
    }
    /**
     * Random Question entities.
     *
     */
    public function randomAction(Request $request)
    {
        //Data from questionsearch form
        $data = $request->get('manu_tfebundle_questionsearch');
        //$data['niveau'] = "toto";

        $categorie = $data['categorie'];
        //Current user
        $usr= $this->get('security.context')->getToken()->getUser();
        $userid = $usr->getId();
        //Manager
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository('ManuTfeBundle:Question')->getQuestionsByCategorieAndNiveau($data);

        $statistiques = $em->getRepository('ManuTfeBundle:Statistique')->getStatistiquesOfTheDayByUser($userid);

        $entity = Null;
        //Questions id array
        $statsquestions = array();
        foreach ($statistiques as $statistique){
            $statsquestions[] = $statistique->getQuestion()->getId();
        }
        //Check if a question is available
        foreach ($questions as $question){
            if (!in_array($question->getId(), $statsquestions))
            {
                $entity = $question;
                break;
            }
        }
        if ($entity and $entity->getCategorie()->getCustom())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        //Create new stat
        $stat = new Statistique();
        $stat->setQuestion($entity);
        $stat->setUser($usr);

        //Create quiz form
        $form = $this->randomCreateStatistiqueForm($stat);
        $form->handleRequest($request);

        //When quiz is validated
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stat);
            $em->flush();
            $question = $em->getRepository('ManuTfeBundle:Question')->find($stat->getQuestion());
            if ($stat->getReponse() == $question->getReponse())
            {
                $this->get('session')->getFlashBag()->add(
                                'notice',
                                'Bonne réponse !');
            } else {
                $this->get('session')->getFlashBag()->add(
                                'error',
                                'Mauvaise réponse...');
            }

            return $this->searchAction($request);
//            return $this->redirect($this->generateUrl('manu_statistique_show', array('id' => $stat->getId())));
        }

        //If no question available
        if (!$entity) {
            return $this->render('ManuTfeBundle:Question:empty.html.twig');
        }

        //Render the quiz
        return $this->render('ManuTfeBundle:Question:quiz.html.twig', array(
            'entity'      => $entity,
            'userid'      => $userid,
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
    private function randomCreateStatistiqueForm(Statistique $entity)
    {
        $form = $this->createForm(new StatistiqueType(), $entity, array(
            'em' => $this->getDoctrine()->getManager(),
            'action' => $this->generateUrl('manu_question_show_random'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }
    /**
     * Creates a new Question entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Question();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('manu_question_show', array('id' => $entity->getId())));
        }

        return $this->render('ManuTfeBundle:Question:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Question entity.
     *
     * @param Question $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Question $entity)
    {
        $form = $this->createForm(new QuestionType(), $entity, array(
            'action' => $this->generateUrl('manu_question_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Question entity.
     *
     */
    public function newAction()
    {
        $entity = new Question();
        $form   = $this->createCreateForm($entity);

        return $this->render('ManuTfeBundle:Question:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Question entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ManuTfeBundle:Question')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Question entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ManuTfeBundle:Question:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Question entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ManuTfeBundle:Question')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Question entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ManuTfeBundle:Question:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Question entity.
    *
    * @param Question $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Question $entity)
    {
        $form = $this->createForm(new QuestionType(), $entity, array(
            'action' => $this->generateUrl('manu_question_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Question entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ManuTfeBundle:Question')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Question entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('manu_question_edit', array('id' => $id)));
        }

        return $this->render('ManuTfeBundle:Question:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Question entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ManuTfeBundle:Question')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Question entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('manu_question'));
    }

    /**
     * Creates a form to delete a Question entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manu_question_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
