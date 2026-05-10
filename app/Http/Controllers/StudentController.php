<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm'      => 'required|unique:students,npm',
            'name'     => 'required',
            'email'    => 'required|email|unique:students,email',
            'prodi'    => 'required',
            'angkatan' => 'required|digits:4',
            'status'   => 'required|in:aktif,cuti,lulus',
            'no_hp'    => 'required',
        ]);

        Student::create($request->all());
        return redirect('/student')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.form', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm'      => 'required|unique:students,npm,' . $id,
            'name'     => 'required',
            'email'    => 'required|email|unique:students,email,' . $id,
            'prodi'    => 'required',
            'angkatan' => 'required|digits:4',
            'status'   => 'required|in:aktif,cuti,lulus',
            'no_hp'    => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('/student')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/student')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}