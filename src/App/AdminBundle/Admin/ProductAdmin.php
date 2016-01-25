<?php

namespace App\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin as Admin;
use Sonata\AdminBundle\Datagrid\ListMapper as ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper as DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper as FormMapper;
use Sonata\AdminBundle\Show\ShowMapper as ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use App\AppBundle\Entity\Category as Category;

class ProductAdmin extends Admin
{ 
    /**
     * @param ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
        ;
    }
    /**
     * 
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {    
        $formMapper
                ->with('Product', array('class' => 'col-md-3'))
                    ->add('name', 'text')
                ->end()
                ->with('Categorys', array('class' => 'col-md-9'))
                    ->add('categorys', 'sonata_type_model', array(
                        'label' => 'Category', 
//                        'by_reference' => false, 
                        'expanded' => true, 
                        'multiple' => true
                        ))
                ->end()
        ;
        
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('name')
                ->add('categorys', null, array(
                    'field_options' => array(
                        'expanded' => true, 
                        'multiple' => true)
                    ))
                ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('name')
                ->add('_action', 'actions', array(
                    'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                        )
                    ))
            ;
    }
}