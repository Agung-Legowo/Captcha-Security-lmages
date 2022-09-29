<?php 
session_start(); 
if( isset($_POSTrsubmit'])) {
if(($_SESSION['security_code']  ==  $_POST['security_code']) &&
(!empty($_SESSION['security_code'])) ) { 
// Masukan kode yang Anda masukkan dari form ini
 echo 'Kode keamanan yang Anda masukkan benar'; 
} else { 
    // Pesan error jika masukan kode yang Anda masukkan salah 
    echo 'Maaf kode yang Anda masukkan salah<br />'; 
    include "input.htm";
}    
} else { 
    include "input.htm"; 
    } 
?> 