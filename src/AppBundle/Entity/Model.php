<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\ModelCategory;
use AppBundle\Entity\Traits\ModelType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Model {

    use ModelCategory;

use ModelType;

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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * Many User have Many Phonenumbers.
     * @ORM\ManyToMany(targetEntity="ModelEntity")
     * @ORM\JoinTable(name="model_model_entity",
     *      joinColumns={@ORM\JoinColumn(name="model_entity_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="model_id", referencedColumnName="id")}
     *      )
     */
    private $entities;

    /**
     * @var array
     *
     * @ORM\Column(name="content", type="array")
     */
    private $content;

    public function __construct() {
        $this->entities = new ArrayCollection();
    }

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
     * @return Model
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
     * Set type
     *
     * @param string $type
     *
     * @return Model
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType() {
        if (isset($this->modelType[$this->type])) {
            return $this->modelType[$this->type];
        }
        return;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Model
     */
    public function setCategory($category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory() {
        if (isset($this->modelCategory[$this->category])) {
            return $this->modelCategory[$this->category];
        }
        return;
    }

    /**
     * Set content
     *
     * @param array $content
     *
     * @return Model
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return array
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Add entity
     *
     * @param \AppBundle\Entity\ModelEntity $entity
     *
     * @return Model
     */
    public function addEntity(\AppBundle\Entity\ModelEntity $entity) {
        $this->entities[] = $entity;

        return $this;
    }

    /**
     * Remove entity
     *
     * @param \AppBundle\Entity\ModelEntity $entity
     */
    public function removeEntity(\AppBundle\Entity\ModelEntity $entity) {
        $this->entities->removeElement($entity);
    }

    /**
     * Get entities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntities() {
        return $this->entities;
    }

}
