<?php
class TeacherController extends Controller {
    public function index() {
        $attempts = $_SESSION['global_attempts'] ?? [];
        $this->view('teacher_dashboard', ['attempts' => $attempts]);
    }

    public function clear() {
        unset($_SESSION['global_attempts']);
        header("Location: " . BASE_URL . "/teacher");
        exit;
    }
}

