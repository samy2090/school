<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentRepositoryInterface;
use App\Interfaces\TeacherRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $studentRepository;
    protected $teacherRepository;

    public function __construct(StudentRepositoryInterface $studentRepository, TeacherRepositoryInterface $teacherRepository ) 
    {
        $this->studentRepository = $studentRepository;
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['students']       = $this->studentRepository->getStudents();
        $data['stdParents']     = $this->studentRepository->getStdParent();
        $data['nationalities']  = $this->studentRepository->getNationality();
        $data['bloods']         = $this->studentRepository->getBloodType();
        $data['grades']         = $this->studentRepository->getGrade();
        $data['genders']        = $this->teacherRepository->getGenders();
        return view('dashboard.student.studenIndex',$data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->studentRepository->studentSave( $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        return $this->studentRepository->studentUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function uploadAttachs(Request $request)
    {
        return $this->studentRepository->uploadAttachs($request);
    }

    public function attachmentDelete($id)
    {
        return $this->studentRepository->attachmentDelete($id);
    }

    public function destroy($id)
    {
        return $this->studentRepository->deleteStudent($id);
    }
}
