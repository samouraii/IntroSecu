<?php
namespace Manu\TfeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Manu\TfeBundle\Entity\Categorie;

class QuestionAdmin extends Admin
{
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'titre'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('categorie', 'sonata_type_model_list', array())
            ->add('niveau', 'sonata_type_model_list', array())
            ->add('titre')
            ->add('file', 'file', array('label' => 'Image', 'required' => false))
            ->add('question')
            ->add('reponse')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('categorie')
            ->add('niveau')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre')
            ->add('categorie')
            ->add('niveau')
            ->add('question')
            ->add('reponse')
        ;
    }
    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);
        $query = $this->getModelManager()->getEntityManager($this->getClass())->createQueryBuilder();
        $query->select('p')
            ->from($this->getClass(), 'p')
            ->where('s_categorie.custom = 0')
        ;
        $proxyQuery = new \Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery($query);
        return $proxyQuery;
    }
}
