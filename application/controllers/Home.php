<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private function ListBooksByPublishedYear($year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBooksByPublishedYear(?)";
		$result = $this->db->query($sql, [$year]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAllBooks() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllBooks()";
		$result = $this->db->query($sql);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAuthorByCategory($category) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAuthorByCategory(?)";
		$result = $this->db->query($sql, [$category]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAuthorByKeyword($keyword) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAuthorByKeyword(?)";
		$result = $this->db->query($sql, [$keyword]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAllAuthors() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllAuthors()";
		$result = $this->db->query($sql);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAllCategories() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllCategories()";
		$result = $this->db->query($sql);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	public function index() {

		$this->data["categories"] = $this->ListAllCategories();

		if (isset($_GET["book-category"])) {
			$this->data["books_list"] = [];
		} 
		else if (isset($_GET["book-author"])) {
			$this->data["books_list"] = [];
		} 
		else if (isset($_GET["book-keyword"])) {
			$this->data["books_list"] = [];
		} 
		else if (isset($_GET["book-publishedyear"])) {
			$year = $_GET["book-publishedyear"];
			$this->data["books_list"] = $this->ListBooksByPublishedYear($year);
		} 
		else {
			$this->data["books_list"] = $this->ListAllBooks();
		}

		if (isset($_GET["author-category"])) {
			$category = $_GET["author-category"];
			$this->data["authors_list"] = $this->ListAuthorByCategory($category);
		} 
		else if (isset($_GET["author-keyword"])) {
			$keyword = $_GET["author-keyword"];
			$this->data["authors_list"] = $this->ListAuthorByKeyword($keyword);
		} 
		else {
			$this->data["authors_list"] = $this->ListAllAuthors();
		}

		$this->data['main_view'] = 'client/home';
		$this->load->view('layout/client/main', $this->data);
	}

	public function notfound() {
		$this->data['main_view'] = 'client/404';
		$this->load->view('layout/client/main', $this->data);
	}
}
