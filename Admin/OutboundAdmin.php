<?php

namespace Zorbus\TrafficBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MaxLength;

class OutboundAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('ip', null, array('constraints' => array(
                        new NotBlank(),
                        new MaxLength(array('limit' => 255))
                        )))
                ->add('source_url', null, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank()
                        ))
                )
                ->add('source_domain', null, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank()
                        ))
                )
                ->add('target_url', null, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank()
                        ))
                )
                ->add('target_domain', null, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank()
                        ))
                )
                ->add('method', 'choice', array(
                    'choices' => array('get' => 'GET', 'post' => 'POST', 'delete' => 'DELETE', 'put' => 'PUT', 'head' => 'HEAD'),
                    'preferred_choices' => array('get', 'post')
                ))
                ->add('headers')
                ->add('query')
                ->add('valid')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('ip')
                ->add('source_url')
                ->add('source_domain')
                ->add('target_url')
                ->add('target_domain')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->add('ip')
                ->addIdentifier('source_url')
                ->add('source_domain')
                ->add('target_url')
                ->add('valid')
        ;
    }

    public function configureShowFields(ShowMapper $filter)
    {
        $filter
                ->with('Source')
                ->add('ip')
                ->add('source_url')
                ->add('source_domain')
                ->add('method')
                ->end()
                ->with('Target')
                ->add('target_url')
                ->add('target_domain')
                ->end()
                ->with('Extra')
                ->add('headers')
                ->add('query')
                ->add('valid')
                ->end()
        ;
    }

}