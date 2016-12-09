<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\ModelType;
use AppBundle\Entity\Traits\ModelCategory;

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
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

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
     * Set text
     *
     * @param string $text
     *
     * @return Model
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Set user
     *
     * @param \SpineSys\UserBundle\Entity\User $user
     *
     * @return Model
     */
    public function setUser(\SpineSys\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SpineSys\UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set healthFacilityGroup
     *
     * @param \SpineSys\HealthFacilityBundle\Entity\HealthFacilityGroup $healthFacilityGroup
     *
     * @return Model
     */
    public function setHealthFacilityGroup(\SpineSys\HealthFacilityBundle\Entity\HealthFacilityGroup $healthFacilityGroup = null) {
        $this->healthFacilityGroup = $healthFacilityGroup;

        return $this;
    }

    /**
     * Get healthFacilityGroup
     *
     * @return \SpineSys\HealthFacilityBundle\Entity\HealthFacilityGroup
     */
    public function getHealthFacilityGroup() {
        return $this->healthFacilityGroup;
    }

    /**
     * Set healthFacility
     *
     * @param \SpineSys\HealthFacilityBundle\Entity\HealthFacility $healthFacility
     *
     * @return Model
     */
    public function setHealthFacility(\SpineSys\HealthFacilityBundle\Entity\HealthFacility $healthFacility = null) {
        $this->healthFacility = $healthFacility;

        return $this;
    }

    /**
     * Get healthFacility
     *
     * @return \SpineSys\HealthFacilityBundle\Entity\HealthFacility
     */
    public function getHealthFacility() {
        return $this->healthFacility;
    }

}
