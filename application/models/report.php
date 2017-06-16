<?php

class Report extends MY_Model{
	const DB_TABLE='report';
	const DB_TABLE_PK='id';

public $id, $date,
       $lat, $lng , $office_id,
       $type, $problem;

}