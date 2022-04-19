<?php

//1 $offset=0; $page=1; 0=x*$perPage; x=$page-1; $offset=($page-1)*$perPage;
//2
//3
//
//4 $offset=3; $page=2; 3=x*$perPage; x=1; -1
//5
//6
//
//7 $offset=6; $page=3; x=2;
//8
//9
//
//10 $offset=9; $page=4; x=3;

$page=1;
$perPage=3;
$pages=ceil(10/$perPage);

$offset=($page-1)*$perPage;
