<?php

namespace Manu\TfeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Manu\TfeBundle\Form\DataTransformer\UserToIdTransformer;
use Manu\TfeBundle\Form\DataTransformer\QuestionToIdTransformer;

class StatistiqueType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $usertransformer = new UserToIdTransformer($options['em']);
        $questiontransformer = new questionToIdTransformer($options['em']);
        $question = $builder->getData()->getQuestion();
        $choice = null;
        if ($question)
        {
            $choice = $question->getChoice();
        }
        if ($choice)
        {
            $builder
                ->add('reponse', 'choice', array(
                    'choices' => $choice));
        }
        else
        {
            $builder
                ->add('reponse');
        }
        $builder
            ->add(
                $builder->create('question', 'hidden')
                ->addModelTransformer($questiontransformer))
            ->add(
                $builder->create('user', 'hidden')
                ->addModelTransformer($usertransformer))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Manu\TfeBundle\Entity\Statistique'
        ))
        ->setRequired(array(
            'em',
        ))
        ->setAllowedTypes(array(
            'em' => 'Doctrine\Common\Persistence\ObjectManager',));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'manu_tfebundle_statistique';
    }
}
