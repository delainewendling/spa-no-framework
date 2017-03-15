<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class StudentController extends Controller
{
    /**
     * @Route("/student_info", name="homepage")
     */
    public function schoolInfo(Request $request)
    {

        //TODO: join in homeroom and school tables to get the school names, group the students by school
        $schools = $this->getSchoolInfo();
        $students = $this->getStudentInfo(517);

        $context = [
            'students' => $students,
            'schools' => $schools
        ];

        return $this->render('students.html.twig', $context);
    }

    /**
     * @Route("/updateStudentInfo", name="student_info")
     * @param Request $request
     */
    public function updateStudentInfo(Request $request)
    {
        $encoder = new JsonEncode();
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('schoolId'));
        $serializer = new Serializer([$normalizer], [$encoder]);
        $schoolId = $request->request->get('schoolId');
        $students = $this->getStudentInfo($schoolId);
        $jsonContent = $serializer->serialize($students, 'json');

        return new JsonResponse($jsonContent);

    }

    public function getSchoolInfo()
    {
        $schoolBuilder = $this->getRepo('School')->createQueryBuilder('school');
        $schoolBuilder->andWhere('school.districtId = :district')
                    ->andWhere('school.id != :excludeSchool')
                    ->orderBy('school.name')
                    ->setParameter('district', 1)
                    ->setParameter('excludeSchool', 0);
        $schools = $schoolBuilder->getQuery()->getResult();
        return $schools;
    }

    public function getStudentInfo($schoolId)
    {
        $builder = $this->getRepo('Student')->createQueryBuilder('student');
        $builder->select('student', 'homeroom')
            ->andWhere('student.schoolId = :schoolId')
            ->andWhere('student.active = :active')
            ->join('student.homeroomId', 'homeroom')
            ->setParameter('schoolId', $schoolId)
            ->setParameter('active', true)
            ->orderBy('student.lastName');
        $students = $builder->getQuery()->getResult();
        return $students;
    }

    protected function getRepo($entity)
    {
        return $this->getDoctrine()->getRepository('AppBundle:'.$entity);
    }

}
