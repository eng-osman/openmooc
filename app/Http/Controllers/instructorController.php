<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Courses\Services\coursesStudentsService;
use OpenMooc\Users\Services\usersService;

class InstructorController extends Controller
{
    private $service;
    private $coursesStudentsService;
    private $userService;

    public function __construct()
    {
        $this->service = new coursesService();
        $this->coursesStudentsService = new coursesStudentsService();
        $this->userService = new usersService();
    }

    public function index($id)
    {
        $studentsCount = $this->coursesStudentsService->countMyStudents($id);
        $coursesCount = $this->service->countMyCourses($id);

        return view('instructor.dashboard')
            ->with('coursesCount', $coursesCount)
            ->with('studentsCount', $studentsCount);
    }

    public function myCourses($id)
    {
        $courses = $this->service->getCoursesByInstructor($id);
        return view('course.courses')->with('coursesList', $courses);
    }

    public function createCourse()
    {


        $categoryService = new coursesCategoriesService();
        $instructor = $this->userService->getUsersByGroup([1, 3]);
        $categories = $categoryService->getCategories();

        return view('course.addcourse')
            ->with('instructors', $instructor)
            ->with('categories', $categories);
    }

    public function updateCourse($course_id)
    {

        $categoryService = new coursesCategoriesService();
        $instructor = $this->userService->getUsersByGroup([1, 3]);
        $categories = $categoryService->getCategories();
        $course = $this->service->getCourse($course_id);
        return view('course.edit')->with('instructors', $instructor)
            ->with('categories', $categories)
            ->with('course', $course);
    }

    public function updateCourseProcess(Request $request, $id)
    {
        if ($this->service->updateCourseProcess($request, $id))
            return 'course updated';
        return $this->service->errors();
    }

    public function deleteCourse($id)
    {
        return ($this->service->deleteCourse($id) == true) ? 'course deleted' : $this->service->errors();
    }

    public function showStudentsInCourse($course_id)
    {
        return view('course.students')
            ->with('students', $this->coursesStudentsService->showStudentsInCourse($course_id));
    }

    public function approveSubscription($id)
    {
        return $this->coursesStudentsService->approve($id);
    }

    public function unApproveSubscription($id)
    {
        return $this->coursesStudentsService->unApprove($id);
    }

    public function deleteSubscription($id)
    {
        return $this->coursesStudentsService->deleteSubscription($id);
    }

    public function myStudents($instructor_id)
    {

        $students = $this->coursesStudentsService->getAllInstructorStudents($instructor_id);
        return view('instructor.allStudents')->with('students', $students);
    }


}