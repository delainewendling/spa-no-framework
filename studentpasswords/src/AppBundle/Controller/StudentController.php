<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{
    /**
     * @Route("/student_info", name="homepage")
     */
    public function studentInfo(Request $request)
    {
        $builder = $this->getRepo('Student')->createQueryBuilder('student');
        $builder->orderBy('student.schoolId');
        $students = $builder->getQuery()->getResult();

        $context = [
            'students' => $students
        ];

        return $this->render('students.html.twig', $context);
    }

    protected function getRepo($entity)
    {
        return $this->getDoctrine()->getRepository('AppBundle:'.$entity);
    }

}
