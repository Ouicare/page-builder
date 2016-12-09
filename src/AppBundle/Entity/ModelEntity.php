<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelEntity
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ModelEntity {

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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="attributes", type="array")
     */
    private $attributes;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ModelEntity
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set attributes
     *
     * @param array $attributes
     *
     * @return ModelEntity
     */
    public function setAttributes($attributes) {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get attributes
     *
     * @return array
     */
    public function getAttributes() {
        return $this->attributes;
    }

}
