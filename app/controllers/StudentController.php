<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function student_data()
    {
        return [
            'student_id' => 'STU-0000',
            'name' => 'Sample Student',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'Section A',
            'email' => 'student@example.com',
            'address' => 'City, Province',
            'contact' => '+63 900 000 0000',
            'about' => 'A curious technology student building useful things one thoughtful detail at a time.',
        ];
    }

    public function index()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['student_access'] = true;
        $this->call->view('student_home', ['student' => $this->student_data()]);
    }

    public function profile()
    {
        $this->call->view('student_profile', ['student' => $this->student_data()]);
    }
}