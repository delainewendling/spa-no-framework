<?php
/**
 * Created by PhpStorm.
 * User: dwendling
 * Date: 3/14/17
 * Time: 12:20 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="student")
 * @ORM\HasLifecycleCallbacks()
 **/
class Student
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="student_id")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\Column(type="text", name="student_fname")
     **/
    protected $firstName;

    /**
     * @ORM\Column(type="text", name="student_lname")
     **/
    protected $lastName;

    /**
     * @ORM\Column(type="text", name="student_email")
     **/
    protected $email;

    /**
     * @ORM\Column(type="text", name="student_password")
     **/
    protected $password;

    /**
     * @ORM\Column(type="integer", name="student_grade")
     **/
    protected $grade;

    /**
     * @ORM\Column(type="integer", name="student_chart")
     **/
    protected $chart;

    /**
     * @ORM\Column(type="boolean", name="student_active")
     **/
    protected $active;

    /**
     * @ORM\Column(type="boolean", name="student_internal")
     **/
    protected $internal;

    /**
    * @ORM\ManyToOne(targetEntity="Homeroom", inversedBy="students")
    * @ORM\JoinColumn(name="homeroom_id", referencedColumnName="homeroom_id")
    */
    protected $homeroomId;

    /**
     * @ORM\ManyToOne(targetEntity="School", inversedBy="students")
     * @ORM\JoinColumn(name="school_id", referencedColumnName="school_id")
     */
    protected $schoolId;

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getChart()
    {
        return $this->chart;
    }

    /**
     * @param mixed $chart
     */
    public function setChart($chart)
    {
        $this->chart = $chart;
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

    /**
     * @return mixed
     */
    public function getInternal()
    {
        return $this->internal;
    }

    /**
     * @param mixed $internal
     */
    public function setInternal($internal)
    {
        $this->internal = $internal;
    }

    /**
     * @return mixed
     */
    public function getHomeroomId()
    {
        return $this->homeroomId;
    }

    /**
     * @param mixed $homeroomId
     */
    public function setHomeroomId($homeroomId)
    {
        $this->homeroomId = $homeroomId;
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



}