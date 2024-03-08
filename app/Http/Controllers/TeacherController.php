<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\TeacherRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacherRepository;

    public function __construct(TeacherRepositoryInterface $teacherRepository) 
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function index(){
        return $this->teacherRepository->getTeachers();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        return $this->teacherRepository->storeTeacher($request);
    }

    public function update(Request $request){
        return $this->teacherRepository->updateTeacher($request);
    }
}
