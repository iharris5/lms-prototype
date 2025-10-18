<?php
class RoleController extends Controller {
    public function index() {
        $this->view('role_select');
    }

    public function choose($role) {
        $_SESSION['role'] = $role;
        $this->view('name_input', ['role' => $role]);
    }

    public function submitName() {
        $name = $_POST['name'] ?? '';
        $role = $_SESSION['role'] ?? 'student';

        if (!$name) {
            echo "Name is required.";
            return;
        }

        $_SESSION['name'] = $name;

        if ($role === 'student') {
            header("Location: " . BASE_URL . "/quiz");
        } else {
            header("Location: " . BASE_URL . "/teacher");
        }
        exit;
    }

    public function logout() {
	$attempts = $_SESSION['global_attempts'] ?? [];    
	session_destroy();
	session_start();
	$_SESSION['global_attempts'] = $attempts;
	header("Location: " . BASE_URL . "/role");
	exit;
    }
}

