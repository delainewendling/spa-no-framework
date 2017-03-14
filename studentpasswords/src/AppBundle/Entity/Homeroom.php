<?php
/**
 * Created by PhpStorm.
 * User: dwendling
 * Date: 3/14/17
 * Time: 12:38 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="homeroom")
 * @ORM\HasLifecycleCallbacks()
 **/
class Homeroom
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="homeroom_id")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\Column(type="text", name="homeroom_name")
     **/
    protected $name;

    /**
     * @ORM\Column(type="integer", name="homeroom_grade")
     **/
    protected $grade;

    /**
     * @ORM\Column(type="integer", name="school_id")
     **/
    protected $schoolId;

    /**
     * @ORM\Column(type="boolean", name="homeroom_active")
     **/
    protected $active;

    /**
     * @ORM\OneToMany(targetEntity="Student", mappedBy="homeroomId", cascade={"persist"})
     */
    protected $students;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return mixed
     */
    public function getSchoolId()
    {
        return $this->schoolId;
    }

    /**
     * @param mixed $schoolId
     */
    public function setSchoolId($schoolId)
    {
        $this->schoolId = $schoolId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }



}