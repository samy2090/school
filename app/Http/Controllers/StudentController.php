<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository) 
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->studentRepository->getStudents();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
