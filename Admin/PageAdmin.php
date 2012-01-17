<?php

namespace Symtoo\PageBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PageAdmin extends Admin
{
    protected $baseRouteName = 'pageAdmin';

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('isPublished')
            ->add('updatedAt')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('slug')
            ->add('body', 'ckeditor', array('attr' => array('class' => '')))
            ->add('isPublished')
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('isPublished')
            ->add('updatedAt')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    public function getUniqid()
    {
        return 'page';
    }
}