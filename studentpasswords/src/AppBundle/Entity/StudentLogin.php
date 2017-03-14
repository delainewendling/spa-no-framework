<?php
/**
 * Created by PhpStorm.
 * User: dwendling
 * Date: 3/14/17
 * Time: 12:35 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="student_login")
 * @ORM\HasLifecycleCallbacks()
 **/
class StudentLogin
{

    /**
     * @ORM\Column(type="text", name="fname")
     **/
    protected $firstName;

    /**
     * @ORM\Column(type="text", name="lname")
     **/
    protected $lastName;

    /**
     * @ORM\Column(type="integer", name=student_id")
     **/
    protected $studentId;

    /**
     * @ORM\Column(type="text", name="username")
     **/
    protected $userName;

    /**
     * @ORM\Column(type="text", name="password")
     **/
    protected $password;

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
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
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


}