<?php

namespace Zorbus\TrafficBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MaxLength;
use Symfony\Component\Validator\Constraints\Min;

class RedirectAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('url', null, array('constraints' => array(
                        new NotBlank(),
                        new MaxLength(array('limit' => 255))
                        )))
                ->add('hits', null, array(
                    'required' => false,
                    'attr' => array('class' => 'span2'),
                    'constraints' => array(
                        new Min(array('limit' => 0))
                        ))
                )
                ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('url')
                ->add('token')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('url')
                ->add('token')
                ->add('hits')
                ->add('enabled')
        ;
    }
    public function configureShowFields(ShowMapper $filter)
    {
        $filter
                ->add('url')
                ->add('token')
                ->add('hits')
                ->add('enabled')
        ;
    }

}