<?php
// CSci 130 - Web Programming

	function generateRandomString($length = 10) {
		// list of characters that can be present in the string
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	// Class for the form Entry,
	class Entry implements JsonSerializable{
		private $sel;
		private $title;
		private $artist;
		private $top_genre;
		private $year;
		private $added;
		private $rating;
		
		function __construct() {
			$this->SetSel(strval(rand(0,10000)));
			$this->SetTitle(generateRandomString());
			$this->SetArtist(generateRandomString());
			$this->SetTopGenre(generateRandomString());
			$this->SetYear(strval(rand(1800,2024)));
			$this->SetAdded(generateRandomString());
			$this->SetRating("");
			
		}
		
		public function GetSel() { return $this->sel; }
		public function GetTitle() { return $this->title; }
		public function GetArtist() { return $this->artist; }
		public function GetTopGenre() { return $this->top_genre; }
		public function GetYear() { return $this->year; }
		public function GetAdded() { return $this->added; }
		public function GetRating() { return $this->rating; }
		
		public function SetSel($input) {  $this->sel=$input; }
		public function SetTitle($input) {  $this->title=$input; }
		public function SetArtist($input) {  $this->artist=$input; }
		public function SetTopGenre($input) {  $this->top_genre=$input; }
		public function SetYear($input) {  $this->year=$input; }
		public function SetAdded($input) {  $this->added=$input; }
		public function SetRating($input) {  $this->rating=$input; }
		
		public function JsonSerializable() { //this is needed for JSON outputs
			return get_object_vars($this);
		}

		public function JsonSerialize(): mixed {
			return [
				'sel' =>$this->sel,
				'title' =>$this->title,
				'artist' =>$this->artist,
				'top_genre' =>$this->top_genre,
				'year' =>$this->year,
				'added' =>$this->added,
				'rating'=> $this->rating,
			];
		}
	}
?>