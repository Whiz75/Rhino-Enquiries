<?php

    class sObject {
        public $firstname;
        public $lastname;
        public $email;
        public $country;
        public $contact_number;
        public $holiday_type;
        public $adults;
        public $children;
        public $arrival_date;
        public $departure_date;
        public $comment;

//        function __construct($firstname, $lastname,$email,$country,$contact_number,
//                             $holiday_type,$adults,$children,$arrival_date,$departure_date,$comment) {
//            $this->firstname = $firstname;
//            $this->lastname = $lastname;
//            $this->email = $email;
//            $this->country = $country;
//            $this->contact_number = $contact_number;
//            $this->holiday_type = $holiday_type;
//            $this->adults = $adults;
//            $this->children = $children;
//            $this->arrival_date = $arrival_date;
//            $this->departure_date = $departure_date;
//            $this->comment = $comment;
//        }

       public function getFirstname()
        {
            return $this->firstname;
        }

        public function setFirstname($firstname)
        {
            $this->firstname = $firstname;
        }

        public function getLastname()
        {
            return $this->lastname;
        }

        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
        }

        public function getEmail()
        {
            return $this->email;
        }


        public function setEmail($email)
        {
            $this->email = $email;
        }


        public function getCountry()
        {
            return $this->country;
        }


        public function setCountry($country)
        {
            $this->country = $country;
        }


        public function getContactNumber()
        {
            return $this->contact_number;
        }


        public function setContactNumber($contact_number)
        {
            $this->contact_number = $contact_number;
        }


        public function getHolidayType()
        {
            return $this->holiday_type;
        }

        public function setHolidayType($holiday_type)
        {
            $this->holiday_type = $holiday_type;
        }

        /**
         * @return mixed
         */
        public function getAdults()
        {
            return $this->adults;
        }

        /**
         * @param mixed $adults
         */
        public function setAdults($adults)
        {
            $this->adults = $adults;
        }

        /**
         * @return mixed
         */
        public function getChildren()
        {
            return $this->children;
        }

        /**
         * @param mixed $children
         */
        public function setChildren($children)
        {
            $this->children = $children;
        }

        /**
         * @return mixed
         */
        public function getArrivalDate()
        {
            return $this->arrival_date;
        }

        /**
         * @param mixed $arrival_date
         */
        public function setArrivalDate($arrival_date)
        {
            $this->arrival_date = $arrival_date;
        }

        /**
         * @return mixed
         */
        public function getDepartureDate()
        {
            return $this->departure_date;
        }

        /**
         * @param mixed $departure_date
         */
        public function setDepartureDate($departure_date)
        {
            $this->departure_date = $departure_date;
        }

        /**
         * @return mixed
         */
        public function getComment()
        {
            return $this->comment;
        }

        /**
         * @param mixed $comment
         */
        public function setComment($comment)
        {
            $this->comment = $comment;
        }
    }
?>