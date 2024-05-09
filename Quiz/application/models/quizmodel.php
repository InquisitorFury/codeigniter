<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class quizmodel extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getAllQuizzes() {
		$this->db->select('quizID, Name');  // Assuming each quiz has an 'id' and 'name'
		$this->db->from('quiz');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return [];
		}
	}
	
	public function getQuestions($quizID)
	{
		// Select fields
		$this->db->select('questionID, Question, choice1, choice2, choice3, answer, Name, quizID');
		$this->db->from('questions');
		// Add where condition to filter by quizID
		$this->db->where('quizID', $quizID);

		// Execute the query
		$query = $this->db->get();

		// Check if there are any results
		if ($query->num_rows() == 0) {
		    // Optionally, you can log this situation with log_message() if needed.
		    return []; // Return an empty array if no questions found.
		}

		// Return query result as an array of objects.
		return $query->result();
	}

	
	
}
