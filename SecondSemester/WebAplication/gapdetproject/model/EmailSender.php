<?php

class EmailSender 
{
    public function send($to, $subject, $message, $from )
    {
        $additional_headers="From: ". $from;
        $additional_headers.= "\nMIME-Version: 1.0\n";
        $additional_headers.= "Content-Type: text/html; charset=\"utf-8\"\n";
        return mb_send_mail($to,$subject,$message,$additional_headers);
        
    }
}