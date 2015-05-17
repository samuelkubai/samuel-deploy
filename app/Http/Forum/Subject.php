<?php namespace App\Http\Forum;


class Subject {

    public $id;

    protected $subjects = [
        '1' =>'general'  ,
        '2'=> 'class',
        '3' => 'announcements',
        '4' =>  'staff'  ,
    ];
     public $name;


    public function __construct($name, $subjects =null)
    {
        $this->name = $name;

        $counter = 1;

        foreach($this->subjects as $subject)
        {
            if($name == $subject){ $this->id  = $counter ;}
            $counter ++;
        }

    }



}