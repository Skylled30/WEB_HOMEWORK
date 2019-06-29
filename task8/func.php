<?php
function findtail($str){
	if(preg_match("/^[a-z0-9а-я_]+\.[a-z]+$/", $str)){
		preg_match("/\.[a-z]+/", $str, $mas);
		$res=substr($mas[0], 1);
		return $res;
	}
	return "Не верный формат ввода";
}
function checktail($str){
	if(preg_match("/^[a-z0-9а-я_]+\.[a-z0-9]+$/", $str)){
		if(preg_match("/(\.zip|\.rar|\.tz|\.gzip|\.7z)/", $str)){
			return "Архив";
		}
		else if(preg_match("/(\.mp3|\.midi|\.m4p|\.temp)/", $str)){
			return "Аудиофайл";
		}
		else if(preg_match("/(\.mp4|\.mov|\.avi|\.flv|\.vob)/", $str)){
			return "Видеофайл";
		}
		else if(preg_match("/(\.jpg|\.png|\.bmp|\.pict|\.cur)/", $str)){
			return "Картинка";
		}
		else
			return "Не знаю";
	}
	return "Не знаю";
}
function find_in_title_teg($str){
	if(preg_match("#<title>(.+)</title>#",$str,$mas)){
		return $mas[1];
	}
	return "В данном html-коде нет тега title";
}
function find_in_a_teg($str){ 
	if(preg_match_all("#<a(.+)href=\"(.+?)\"#", $str, $mas)){
		preg_match_all("#<a(.+)href='(.+?)'#", $str, $mas1);
		if(isset($mas)){
		for($i=0;$i<count($mas[2]);$i++)
			echo $mas[2][$i]."<br>";
		} 
		if(isset($mas1)){
		for($i=0;$i<count($mas1[2]);$i++)
			echo $mas1[2][$i]."<br>";
		} 
		return;
		} 
	else if(preg_match_all("#<a(.+)href='(.+?)'#", $str, $mas1)){
		for($i=0;$i<count($mas1[2]);$i++)
			echo $mas1[2][$i]."<br>";
		return; 
		}
	else{
		return "В данном html-коде нет ссылок";
	}
} 
function find_in_img_teg($str){ 
	if(preg_match_all("#<img(.+)src=\"(.+?)\"#", $str, $mas)){
		preg_match_all("#<img(.+)src='(.+?)'#", $str, $mas1);
		if(isset($mas)){
		for($i=0;$i<count($mas[2]);$i++)
			echo $mas[2][$i]."<br>";
		} 
		if(isset($mas1)){
		for($i=0;$i<count($mas1[2]);$i++)
			echo $mas1[2][$i]."<br>";
		} 
		return;
		} 
	else if(preg_match_all("#<img(.+)src='(.+?)'#", $str, $mas1)){
		for($i=0;$i<count($mas1[2]);$i++)
			echo $mas1[2][$i]."<br>";
		return; 
		}
	else{
		return "В данном html-коде нет ссылок на картинки";
	} 
}
function find_str_in_text($text, $str){
	$sstr="<strong>$str</strong>";
	$str="/$str/";
	if(preg_match($str, $text)){
		$sstr="$sstr";
		$res=preg_replace($str, $sstr, $text);
		return $res;
	}
	return "Данной строки в тексте нет";
}
function replace_emoji($text){
	$em1="/\:\)/";
	$em2="/\;\)/";
	$em3="/\:\(/";
	$res=$text;
	$count=0;
	if(preg_match($em1, $text)){
		$em1_repl="<img src='smile.png' alt=':)'>";
		$res=preg_replace($em1, $em1_repl, $res);
		$count+=1;
	}
	if(preg_match($em2, $text)){
		$em2_repl="<img src='wink.png' alt=';)'>";
		$res=preg_replace($em2, $em2_repl, $res);
		$count+=1;
	}
	if(preg_match($em3, $text)){
		$em3_repl="<img src='sad.png' alt=':('>";
		$res=preg_replace($em3, $em3_repl, $res);
		$count+=1;
	}
	if($count!=0)
		return $res;
	else
		return "В данной строке нет подобных смайлов";
}
function delete_space($str){
	$reg="/\s{2,}/";
	if(preg_match($reg, $str)){
		$reg_repl=" ";
		$res=preg_replace($reg, $reg_repl, $str);
		return $res;
	}
	return "В данной строке нет подобной ошибки";
}
