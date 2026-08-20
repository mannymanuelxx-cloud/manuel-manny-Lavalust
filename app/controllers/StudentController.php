<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function student_data()
    {
        return [
            'student_id' => 'MCC2024-00159',
            'name' => 'Manuel, Manny',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => '3-F4',
            'email' => 'mannymanuelxx@gmail.com',
            'address' => 'Sta Isabel, Calapan City',
            'contact' => '+63 966 029 4493',
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