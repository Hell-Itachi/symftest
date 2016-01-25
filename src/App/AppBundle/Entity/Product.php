<?php

namespace App\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable as JoinTable;
use Doctrine\ORM\Mapping\ManyToMany as ManyToMany;
use Doctrine\Common\Collections\Collection as Collection;
use App\AppBundle\Entity\Category as Category;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ManyToMany(targetEntity="Category", inversedBy="id")
     * @JoinTable(name="products_categorys")
     */
    private $categorys;

    public function __construct() {
        $this->categorys = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * 
     * @param type $categorys
     * @return Category
     */
    public function setCategorys($categorys) {
        $this->categorys = $categorys;
        return $this;
    }

    /**
     * Add categorys
     *
     * @param Category $categorys
     * @return Product
     */
    public function addCategory(Category $categorys)
    {
        $this->categorys[] = $categorys;
        $categorys->setCategorys($this);
    }

    /**
     * Remove categorys
     *
     * @param Category $categorys
     */
    public function removeCategory(Category $categorys)
    {
        $this->categorys->removeElement($categorys);
    }

    /**
     * Get categorys
     *
     * @return Collection 
     */
    public function getCategorys()
    {
        return $this->categorys;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->getName();
    }

}