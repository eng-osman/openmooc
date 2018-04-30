<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\categoryService;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Users\Services\usersService;
use Illuminate\Support\Facades\Auth;

class frontController extends Controller
{
    public function index()
    {
        $catService   = new categoryService();
        $categories = $catService->getCategories();

        $cService   = new coursesService();
        $courses = $cService->getCourses();

        return view('front.index')->with('categories',$categories)
            ->with('courses',$courses);
    }

    // category page
    public function category($id=0)
    {
        $catService   = new categoryService();
        $category = $catService->getCategory($id);

        if(!$category){
            abort(404);
        }else{
            $cService   = new coursesService();
            $courses = $cService->getCoursesByCategory($id);

            return view('front.category')->with('category',$category)
                ->with('courses',$courses);
        }
    }

    // course page
    public function course($id=0)
    {
        $cService   = new coursesService();
        $course = $cService->getCourse($id);
        if(!$course){
            abort(404);
        }else{
            return view('front.course')->with('course',$course);
        }
    }

    // instructor page
    public function instructor($id=0)
    {
        $uService   = new usersService();
        $user = $uService->getUser($id);
        if(!$user){
            abort(404);
        }else{
            $cService   = new coursesService();
            $courses = $cService->getCoursesByInstructor($id);
            return view('front.instructor')->with('user',$user)
                                           ->with('courses',$courses);
        }
    }


    // register
    public function register()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('front.register');
    }

    // register
    public function processregister(Request $request)
    {
        $uService   = new usersService();
        if($uService->addUser($request)){
            return redirect('login')->with('success','register successful');
        }else{
            return redirect()->back()->with('errors',$uService->errors());
        }
    }
    // login
    public function login()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('front.login');
    }

    // login
    public function processlogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {

            return redirect('/');
        }else{
            return redirect()->back()->with('error','invalid data');
        }
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function about()
    {
        return view('front.about');
    }

        public function contact()
    {
        return view('front.contact');
    }


}