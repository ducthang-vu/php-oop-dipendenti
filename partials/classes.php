<?php

class Employee {
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

    public function __construct($name, $fiscalCode, $address, $phoneNumber, $employees) {
        $this->name = $name;
        $this->fiscalCode = $fiscalCode;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        foreach($employees as $key => $employee) {
            $this->hrStock[] = $employee[4] === 'manager' ? 
                                new Manager($key, ...$employee) : new Employee($key, ... $employee);
        }
    }

    public function getHrStock() {
        return $this->hrStock;
    }
}
