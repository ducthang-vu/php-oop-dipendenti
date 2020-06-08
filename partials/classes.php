<?php

class Employee {
    private static $roles = ['intern', 'secretary', 'clerk', 'manager'];
    private static $genders = ['m', 'f'];

    public static function getRoles() {
        return self::$roles;
    }

    public static function getGenders() {
        return self::$genders;
    }

    protected $id;
    protected $surname;
    protected $name;
    protected $gender;
    protected $birthdate;
    protected $role;
    protected $salary;

    public function __construct($id, $surname, $name, $gender, $birthdate, $role, $salary) {
        $this->id = $id;
        $this->surname= $surname;
        $this->name = $name;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->role = $role;
        $this->salary = $salary;
    }

    public function getProps() {
        return get_object_vars($this);
    }

    public function setRole($newRole){
        $this->role = $newRole;
    }

    public function setGender($newSalary){
        $this->salary = $newSalary;
    }
}


class Manager extends Employee{
    protected $project;
    protected $reportCode;
    protected $specialAuthorization;

    public function __construct($id, $surname, $name, $gender, $birthdate, $role, $salary, $project, $reportCode, $specialAuthorization) {
        parent::__construct($id, $surname, $name, $gender, $birthdate, $role, $salary);
        $this->project = $project;
        $this->reportCode = $reportCode;
        $this->specialAuthorization = $specialAuthorization;
    }
}


class Company {
    private $name;
    private $fiscalCode;
    private $address;
    private $phoneNumber;
    private $hrStock = [];
    private $Errors = [];

    public function __construct($name, $fiscalCode, $address, $phoneNumber, $employees) {
        $this->name = $name;
        $this->fiscalCode = $fiscalCode;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        foreach($employees as $key => $employee) {
            try {
                $this->add_employee($key, $employee);
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }

        }
    }

    public function getProps() {
        return get_object_vars($this);
    }
    
    public function add_employee($id, $array_props) {
        if (!in_array($array_props[2], Employee::getGenders()) || 
            !in_array($array_props[4], Employee::getRoles())) {
                throw new Exception('The element ' . $id . ' cannot be added as new employee or manager for a error; please check the data');
            }

        $this->hrStock[] =$array_props[4] === 'manager' ? 
            new Manager($id, ...$array_props) : new Employee($id, ... $array_props);
    }
}
