<?php
class Controller {
	protected function view($view, $data = []) {
		$data['base_url'] = BASE_URL;
		
		extract($data);
    		$path = __DIR__ . "/../../public/assets/views/$view.php";

    		echo "<!-- Looking for view at: $path -->";

    		if (file_exists($path)) {
        		echo "<!-- View found, loading now -->";
        		require $path;
    		} else {
        		echo "<p style='color:red;'>View not found at path: $path</p>";
    		}
	}
}

