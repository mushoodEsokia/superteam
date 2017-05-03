<?php

namespace contrib\TopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="contrib\TopBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;
    
    /**
    * @ORM\ManyToMany(targetEntity="contrib\TopBundle\Entity\Skill", cascade={"persist"})
    */
    private $skill;
    
    /**
    * @ORM\OneToMany(targetEntity="contrib\TopBundle\Entity\History", mappedBy="user")
    */
    private $histories; 
    
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
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skill = new \Doctrine\Common\Collections\ArrayCollection();
        $this->histories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add skill
     *
     * @param \contrib\TopBundle\Entity\Skill $skill
     *
     * @return User
     */
    public function addSkill(\contrib\TopBundle\Entity\Skill $skill)
    {
        $this->skill[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \contrib\TopBundle\Entity\Skill $skill
     */
    public function removeSkill(\contrib\TopBundle\Entity\Skill $skill)
    {
        $this->skill->removeElement($skill);
    }

    /**
     * Get skill
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Add history
     *
     * @param \contrib\TopBundle\Entity\History $history
     *
     * @return User
     */
    public function addHistory(\contrib\TopBundle\Entity\History $history)
    {
        $this->histories[] = $history;

        return $this;
    }

    /**
     * Remove history
     *
     * @param \contrib\TopBundle\Entity\History $history
     */
    public function removeHistory(\contrib\TopBundle\Entity\History $history)
    {
        $this->histories->removeElement($history);
    }

    /**
     * Get histories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistories()
    {
        return $this->histories;
    }
}
