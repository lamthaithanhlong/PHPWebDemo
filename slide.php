<?php
	class Slide {
		protected $conn;
		public $slides;
		public $slideData;

		public function __construct($conn) {
			$this->conn = $conn;
			$this->slideData = $this->getSlidesData();
			if ($conn->connect_errno > 0) {
				die('Unable to connect to database');
			} else {
				
			}
		}
		protected function getSlidesData() {
			$query = "SELECT * FROM images";
			return ($this->conn)->query($query);
		}

		public function getIndicators() {
			$x = mysqli_num_rows($this->slideData);
			for ($i=0; $i < $x;$i++) {
				if ($i == 0) {
					$class = "active";
				} else {
					$class = "";
				}
				echo "<li data-target='#carousel-generic' data-slide-to='" . $i . "' class='" . $class . "'></li>";
			}
		}

		protected function getImages() {
			$x = 0;
			while ($row = mysqli_fetch_array($this->slideData)) {
				if ($x == 0) {
					$class = " active";
				} else {
					$class = "";
				}
				echo "<div class='item cang" . $class . "'><img src='" . $row['file'] . "' alt=''><div class='carousel-caption'>" . $row['caption'] . "</div></div>";
				$x++;
			}
		}

		public function getSlides() {
			$slideshow = "";
			$slideshow.= "<div id='carousel-generic' class='carousel slide' data-ride='carousel'>";
			$slideshow.= "<ol class='carousel-indicators'>";
			echo $slideshow;

			//Output slide indicators
			echo $this->getIndicators();
			$slideshow = "";
			$slideshow.= "</ol><div class='carousel-inner'>";
			echo $slideshow;
			//Output slide images + captions
			echo $this->getImages();
			$slideshow = "";
			$slideshow.= "</div><a class='left carousel-control' href='#carousel-generic' data-slide='prev'>";
			$slideshow.= "<span class='glyphicon glyphicon-chevron-left'></span></a>";
			$slideshow.= "<a class='right carousel-control' href='#carousel-generic' data-slide='next'>";
			$slideshow.= "<span class='glyphicon glyphicon-chevron-right'></span></a></div>";
			echo $slideshow;
		}
	}
 ?>