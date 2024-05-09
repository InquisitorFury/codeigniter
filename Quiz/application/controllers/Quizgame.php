<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizgame extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function quiz(){
		$this->load->view('QuizView');
	}
	public function questions($quizID = NULL)
	{
		if (!$quizID) {
			// Redirect to a default page or error page if no quiz ID is provided
			redirect('path/to/error/page'); // Adjust this path as necessary
		}
		// Load model 
		$this->load->model('quizmodel');
		// Fetch questions based on quiz ID
		$data['questions'] = $this->quizmodel->getQuestions($quizID);
	
		// Check if questions are returned
		if (empty($data['questions'])) {
			// Handle the case where no questions are found
			// You can redirect to an error page or display a custom message
			$data['error_message'] = 'No questions found for this quiz.';
			// Optionally, display the error view here
			$this->load->view('some_error_view', $data);
		} else {
			// Access quiz name from the first question if available
			$nameofquiz = $data['questions'][0]->Name; // Accessing Name property of the first object in the array
			$data['quiz_name'] = $nameofquiz; // Storing quiz name in $data array to be used in the view
			// Load the quiz display view with the questions data
			$this->load->view('quizdisplay', $data);
		}
	}
	
}
