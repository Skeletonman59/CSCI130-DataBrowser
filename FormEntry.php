<?php
// CSci 130 - Web Programming

	//TODO: replace all php functions, save entries into a class, send to db
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
	abstract class Entry {
		
		private $sel;
		private $title;
		private $artist;
		private $top_genre;
		private $year;
		private $added;
		
		public function GetSel() { return $this->sel; }
		public function GetTitle() { return $this->title; }
		public function GetArtist() { return $this->artist; }
		public function GetTopGenre() { return $this->top_genre; }
		public function GetYear() { return $this->year; }
		public function GetAdded() { return $this->added; }
		
		public function SetSel($input) {  $this->sel=$input; }
		public function SetTitle($input) {  $this->title=$input; }
		public function SetArtist($input) {  $this->artist=$input; }
		public function SetTopGenre($input) {  $this->top_genre=$input; }
		public function SetYear($input) {  $this->year=$input; }
		public function SetAdded($input) {  $this->added=$input; }
	}
?>