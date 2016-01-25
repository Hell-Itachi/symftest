<?php

namespace App\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin as Admin;
use Sonata\AdminBundle\Form\FormMapper as FormMapper;

class CategoryAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name');
    }  
    
}