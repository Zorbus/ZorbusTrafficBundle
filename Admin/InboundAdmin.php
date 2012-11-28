<?php

namespace Zorbus\TrafficBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MaxLength;

class InboundAdmin extends Admin
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
                    'choices' => array('GET' => 'GET', 'POST' => 'POST', 'DELETE' => 'DELETE', 'PUT' => 'PUT', 'HEAD' => 'HEAD'),
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
                ->addIdentifier('ip')
                ->add('source_url')
                ->add('source_domain')
                ->add('target_url')
                ->add('valid')
                ->add('created_at')
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