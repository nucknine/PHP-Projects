<?php
/***interface Shape***/
interface MediaPlayer{
	function play($type, $name);
}

/***interface Shape***/
interface SuperMediaPlayer{
	function playOgg($name);
	function playMp4($name);
}

/***Player for wav and mp3***/
// class AudioPlayer implements MediaPlayer {
// 	function play($t, $n) {
// 		switch($type){
// 			case "WAV" : echo "Plaing Wav $name"; break;
// 			case "MP3" : echo "Plaing MP3 $name"; break;
// 		}
// 	}
// }

/***Player for ogg***/
class OggPlayer implements SuperMediaPlayer {
	function playOgg($name) {
		echo "Plaing Ogg $name \n";
	}
	function playMp4($name){}
}

/***Player for mp4***/
class Mp4Player implements SuperMediaPlayer {
	function playOgg($name) {}
	function playMp4($name){
		echo "Plaing Mp4 $name \n";
	}
}

/***How crate a player for all formats???***/

/***MediaAdapter***/
class MediaAdapter implements MediaPlayer{
	private $SuperMediaPlayer;
	function __construct($type){
		switch($type){
			case "OGG" : $this->SuperMediaPlayer = new OggPlayer; break;
			case "MP4" : $this->SuperMediaPlayer = new Mp4Player; break;
		}

	}

	function play($type, $name) {
		switch($type){
			case "OGG" : $this->SuperMediaPlayer->playOgg($name) ; break;
			case "MP4" : $this->SuperMediaPlayer->playMp4($name) ; break;
		}
	}
}

/***new version audio player with adapter! ***/
class AudioPlayer implements MediaPlayer {
	private $mediaAdapter;
	function play($type, $name) {
		switch($type){
			case "WAV" : echo "Plaing Wav $name \n"; break;
			case "MP3" : echo "Plaing Mp3 $name \n"; break;
			case "OGG" :
			case "MP4" :
				$this->mediaAdapter = new MediaAdapter($type);
				$this->mediaAdapter->play($type, $name);
		}
	}
}


$Player = new AudioPlayer;

$Player -> play("WAV", "Song1");
$Player -> play("MP3", "Song2");
$Player -> play("MP4", "Song3");
$Player -> play("OGG", "Song4");
