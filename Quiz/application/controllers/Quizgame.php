<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizgame extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function quiz(){
		$this->load->model('quizmodel');
		$data['quizzes'] = $this->quizmodel->getAllQuizzes();
		$this->load->view('QuizView', $data);
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
			$quizID = $data['questions'][0]->quizID;
			$data['quiz_id'] = $quizID;
			$this->load->view('quizdisplay', $data);
		}
	}

	public function resultdisplay($quizID){
		$this->data['checks'] = array(
			'ques1' => $this->input->post('quizid1'),
			'ques2' => $this->input->post('quizid2'),
			'ques3' => $this->input->post('quizid3'),
			'ques4' => $this->input->post('quizid4'),
			'ques5' => $this->input->post('quizid5'),
			'ques6' => $this->input->post('quizid6'),
			'ques7' => $this->input->post('quizid7'),
			'ques8' => $this->input->post('quizid8'),
			'ques9' => $this->input->post('quizid9'),
			'ques10' => $this->input->post('quizid10'),
		);
		$this->load->model('quizmodel');
		$this->data['questions'] = $this->quizmodel->getQuestions($quizID); // Load questions data
		$quizID = $this->data['questions'][0]->quizID;
		$this->data['quiz_id'] = $quizID;
		$this->load->view('result_display', $this->data);
	}
	
	
	public function create_quiz(){
		// Load any necessary models or libraries
	
		// Check if form is submitted
		if($this->input->post()){
			// Get quiz data from form
			$quiz_data = array(
				'Name' => $this->input->post('quiz_name'), // Assuming you have a form field with name 'quiz_name'
				// Add any other quiz data you want to save
			);
			$this->load->model('quizmodel');
			// Save quiz data to database and get the inserted quiz ID
			$quiz_id = $this->quizmodel->createQuiz($quiz_data);
	
			// Get questions data from form
			$questions_data = array();
			for ($i = 1; $i <= 10; $i++) { // Assuming there are 10 questions
				$questions_data[] = array(
					'Question' => $this->input->post('question_' . $i), // Assuming you have form fields with names like 'question_1', 'question_2', etc.
					'Choice1' => $this->input->post('choice1_' . $i),
					'Choice2' => $this->input->post('choice2_' . $i),
					'Choice3' => $this->input->post('choice3_' . $i),
					'Answer' => $this->input->post('answer_' . $i),
					'quizID' => $quiz_id, // Set the quiz ID for each question
				);
			}
	
			// Save questions data to database
			$this->quizmodel->createQuestions($questions_data);
	
			// Optionally, redirect to a success page or do something else
		}
	
		// Load the quiz and question creation form view
		$this->load->view('createQuiz');
	}
	
}
