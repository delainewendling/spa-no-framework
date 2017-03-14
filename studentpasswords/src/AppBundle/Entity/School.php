<?php
/**
 * Created by PhpStorm.
 * User: dwendling
 * Date: 3/14/17
 * Time: 12:42 PM
 */

namespace AppBundle\Entity;

/**
 * @ORM\Table(name="school")
 * @ORM\HasLifecycleCallbacks()
 **/
class School
{
    /**
     * @ORM\Column(type="integer", name="school_id")
     **/
    protected $id;

    /**
     * @ORM\Column(type="text", name="school_name")
     **/
    protected $name;

    /**
     * @ORM\Column(type="integer", name="sr_school_id")
     **/
    protected $srSchoolId;

    /**
     * @ORM\Column(type="integer", name="district_id")
     **/
    protected $districtId;

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
    public function getSrSchoolId()
    {
        return $this->srSchoolId;
    }

    /**
     * @param mixed $srSchoolId
     */
    public function setSrSchoolId($srSchoolId)
    {
        $this->srSchoolId = $srSchoolId;
    }

    /**
     * @return mixed
     */
    public function getDistrictId()
    {
        return $this->districtId;
    }

    /**
     * @param mixed $districtId
     */
    public function setDistrictId($districtId)
    {
        $this->districtId = $districtId;
    }

    /**
     * @return mixed
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param mixed $students
     */
    public function setStudents($students)
    {
        $this->students = $students;
    }



}