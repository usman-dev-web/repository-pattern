<?php

// membuat representasi dari table admin
namespace Model {
    class Admin
    {
        public function __construct(private ?int $id = null, private ?string $first_name = null, private ?string $last_name = null)
        {
        }

        // get id
        public function getId(){
            return $this->id;
        }

        // set id
        public function setId(int $id){
            $this->id = $id;
        }

        // get first_name
        public function getFirst_name(){
            return $this->first_name;
        }

        // set first_name
        public function setFirst_name(string $first_name){
            $this->first_name = $first_name;
        }

        // get last_name
        public function getLast_name(){
            return $this->last_name;
        }

        // set last_name
        public function setLast_name(string $last_name){
            $this->last_name = $last_name;
        }
    }
}
