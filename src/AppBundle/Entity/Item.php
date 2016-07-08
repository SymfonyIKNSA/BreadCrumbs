<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="field1", type="string", length=255, nullable=true)
     */
    private $field1;

    /**
     * @var string
     *
     * @ORM\Column(name="field2", type="string", length=255, nullable=true)
     */
    private $field2;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set field1
     *
     * @param string $field1
     *
     * @return Item
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;

        return $this;
    }

    /**
     * Get field1
     *
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * Set field2
     *
     * @param string $field2
     *
     * @return Item
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;

        return $this;
    }

    /**
     * Get field2
     *
     * @return string
     */
    public function getField2()
    {
        return $this->field2;
    }
}

