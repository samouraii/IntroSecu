<?php
namespace Manu\TfeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Manu\TfeBundle\Entity\Role;

class UserAdmin extends Admin
{
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'username'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username', 'text', array('label' => 'Nom d\'utilisateur'))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation du mot de passe'),
                'invalid_message' => 'Mot de passe incorrect',
                        ))
            ->add('role', 'sonata_type_model_list', array())
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('role')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('role')
        ;
    }
    public function preUpdate($object)
        {
            $DM = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
            $repository = $DM->getRepository('Manu\TfeBundle\Entity\User')->find($object->getId());
            $Password = $object->getPassword();
            if (!empty($Password)) {
                $encoderservice = $this->getConfigurationPool()->getContainer()->get('security.encoder_factory');
                $encoder = $encoderservice->getEncoder($object);
                $encoded_pass = $encoder->encodePassword($object->getPassword(), $object->getSalt());
                $object->setPassword($encoded_pass);
            } else {
                $object->setPassword($repository->getPassword());
            }
        }
    public function prePersist($object)
        {
            $Password = $object->getPassword();
            $encoderservice = $this->getConfigurationPool()->getContainer()->get('security.encoder_factory');
            $encoder = $encoderservice->getEncoder($object);
            $encoded_pass = $encoder->encodePassword($object->getPassword(), $object->getSalt());
            $object->setPassword($encoded_pass);
        }

}
