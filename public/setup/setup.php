<?php

$tableusers = 'create table if not exists users('.
'id int primary key auto_increment,'.
'email varchar(30) not null default "empty",'.
'password varchar(255) not null default "empty",'.
'rule varchar(10) not null default "empty",'.         
'username varchar(30) not null default "empty",'.
'complete_name varchar(50) not null default "empty",'.
'money int(50) not null default 0,'.
'folder varchar(30) not null default "empty",'.        
'telephone_number varchar(30) not null default "empty",'.
'office_address varchar(100) not null default "empty",'.
'mobile_number varchar(30) not null default "empty",'.
'home_address varchar(100) not null default "empty",'.
'isactive int(1) not null default 0,'.
'emailvrf int(1) not null default 0,'. 
'mobilevrf int(1) not null default 0,'.         
//'activation int(6) not null default 0,'.
'created_at timestamp not null default CURRENT_TIMESTAMP,'.
'updated_at timestamp not null default CURRENT_TIMESTAMP)';
$query = $this->db->query($tableusers);
if($query){
    echo "created table users successful";
}

$confirmcodes = 'create table if not exists confirmcodes('.
'id int primary key auto_increment,'.
'user_id int(30) not null default 0,'.
'codes varchar(10) not null default "empty",'.
'forwhat varchar(20) not null default "empty",'.        
'created_at timestamp not null default CURRENT_TIMESTAMP)';

$query2 = $this->db->query($confirmcodes);
if($query2){
    echo "<br/>created table confirmcodes successful";
}

$userslogins = 'create table if not exists userslogins('.
'id int primary key auto_increment,'.
'user_id int(30) not null default 0,'.
'browser varchar(30) not null default "empty",'.
'ipaddress varchar(20) not null default "empty",'.        
'created_at timestamp not null default CURRENT_TIMESTAMP)';
$query3 = $this->db->query($userslogins);
if($query3){
    echo "<br/>created table userslogins successful";
}

$websitesettings = 'create table if not exists websitesettings('.
'id int primary key auto_increment,'.
'mykey varchar(30) not null default "empty",'.
'myvalue varchar(20) not null default "empty",'.        
'created_at timestamp not null default CURRENT_TIMESTAMP)';
$query4 = $this->db->query($websitesettings);
if($query4){
    echo "<br/>created table websitesettings successful";
}

$websitelinks = 'create table if not exists websitelinks('.
'id int primary key auto_increment,'.
'whereinwebsite varchar(30) not null default "empty",'.
'targetlocation varchar(255) not null default "empty")';
$query5 = $this->db->query($websitelinks);
if($query5){
    echo "<br/>created table websitelinks successful";
}

$websitestrings = 'create table if not exists websitestrings('.
'id int primary key auto_increment,'.
'mykey varchar(30) not null default "empty",'.
'myvalue varchar(255) not null default "empty")';
$query6 = $this->db->query($websitestrings);
if($query6){
    echo "<br/>created table websitestring successful";
}

//----------------------------------------------------------------------------------------------------------

?>
