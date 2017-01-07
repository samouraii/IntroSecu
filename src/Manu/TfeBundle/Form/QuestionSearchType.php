<?php

namespace Manu\TfeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class QuestionSearchType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', 'entity', array('class' => 'ManuTfeBundle:Categorie'))
            ->add('niveau', 'entity', array('class' => 'ManuTfeBundle:Niveau'))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'manu_tfebundle_questionsearch';
    }
}
