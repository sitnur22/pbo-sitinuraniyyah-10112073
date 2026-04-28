<?php
class Employee
{
    private $first_name;
    private $last_name;
    private $age;

    public function __construct($first_name, $last_name, $age)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

// objek 1
$objEmployeeOne = new Employee('Bob', 'Smith', 30);
echo $objEmployeeOne->getFirstName()."<br>";
echo $objEmployeeOne->getLastName()."<br>";
echo $objEmployeeOne->getAge()."<br><br>";

// objek 2
$objEmployeeTwo = new Employee('John', 'Smith', 34);
echo $objEmployeeTwo->getFirstName()."<br>";
echo $objEmployeeTwo->getLastName()."<br>";
echo $objEmployeeTwo->getAge();
?>