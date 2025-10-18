<?php
class QuizController extends Controller {
    public function index() {
        $this->view('quiz');
    }

    public function submit() {
        $answer = $_POST['student_answer'] ?? '';
        $question = "What is photosynthesis?";

        $gradingPrompt = "
You are a K–12 science teacher grading a student's answer.

Question: $question

Student Answer: $answer

Please respond with:
1. A score from 1 to 10
2. A short, encouraging explanation of what they did well or could improve
";

        $recommendPrompt = "
You are a helpful tutor. Based on the student's answer to this science question:

Question: $question
Student Answer: $answer

What topic should the student review next to improve their understanding?
Keep it short and clear.
";

        // Call Cohere for grading and recommendation
        $grading = $this->askCohere($gradingPrompt);
        $recommendation = $this->askCohere($recommendPrompt);

	// Save attempt to session
        $_SESSION['global_attempts'][] = [
            'student' => $_SESSION['name'] ?? 'Unknown',
            'question' => $question,
            'answer' => $answer,
            'grading' => $grading,
            'recommendation' => $recommendation,
            'timestamp' => date('Y-m-d H:i:s'),
	];

	// Pass results to the quiz view
        $this->view('quiz', [
            'grading' => $grading,
            'recommendation' => $recommendation,
        ]);
    }

    private function askCohere($prompt) {
        $apiKey = COHERE_API_KEY;

	$data = [
		'message' => $prompt,
		'chat_history' => [],
		'model' => 'command-a-03-2025',
        ];

        $ch = curl_init('https://api.cohere.ai/v1/chat');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $result = curl_exec($ch);

	if ($result === false) {
		return 'cURL Error: ' . curl_error($ch);
	}

	$response = json_decode($result, true);

        if (isset($response['text'])) {
            return trim($response['text']);
        }

        return 'AI failed to respond.';
    }
}

