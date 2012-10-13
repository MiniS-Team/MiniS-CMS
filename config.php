<?php 
/* Główne ustawienia skryptu MiniS CMS */
$my_login="MiniS_Login";					//Login do panelu administratora
$my_pass="MiniS_Pass";						//Hasło do panelu administratora

$site_name = "Nazwa strony internetowej"; 	//Wpisz tutaj nazwą swoijej witryny
$site_lang = "pl-PL";						//Język strony (Polski: pl-PL, Angielski: en-EN)
require "lang/polski.php";					//Plik językowy skryptu (z folderu "lang")
$site_gsv = "";								//Kod Google-Site-Verification, jesli nie posiadasz pozostaw puste
$site_description = "";						//Opis strony dla wyszukiwarek
$site_keywords = "";						//Słowa kluczowe oddzielone przecinkami (np: MiniS, CMS)
$style_name = "white"; 						//Wpisz nazwe stylu z folderu "css" (white/black/blue/red)

/* Panele */
$panel_lewo = 1;							//Lewy panel: 1- Włączone 0 - Wyłączone
$panel_prawo = 1;							//Prawy panel: 1- Włączone 0 - Wyłączone
$panel_poziomo = 1;							//Poziomy panel: 1- Włączone 0 - Wyłączone

/* Zawartość paneli */
$PlikBodyText = "0.txt";					//Nazwa pliku otwierana w głównym oknie (z folderu "pages")
$LewyPanelText = "lewe_menu.txt";			//Nazwa pliku otwierana w lewym panelu (z folderu "pages")
$PrawyPanelText = "prawe_menu.txt";			//Nazwa pliku otwierana w prawym panelu (z folderu "pages")
$PoziomyPanelText = "poziome_menu.txt";		//Nazwa pliku otwierana w poziomym panelu (z folderu "pages")
@ini_set('allow_url_fopen', 1);
?>