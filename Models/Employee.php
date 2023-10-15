<?php

namespace Models;

use DateTime;
use FileConvertible;

class Employee extends User implements FileConvertible{
    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    private array $awards;

    public function __construct(
        int $id, string $firstName, string $lastName,
        string $email, string $password, string $phoneNumber,
        string $address, DateTime $birthDate, DateTime $membershipExpirationDate, 
        string $role, string $jobTitle, float $salary, 
        string $startDate, array $awards
    ) {
        parent::__construct(
            $id, $firstName, $lastName,
            $email, $password, $phoneNumber,
            $address,  $birthDate, $membershipExpirationDate,
            $role
        );
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = new DateTime($startDate);
        $this->awards = $awards;
    }

    public function toString(): string {
        return sprintf(
            "JobTitle: %s\nSalary: %f\nStart Date: %s\nAwards: %s\n",
            $this->jobTitle,
            $this->salary,
            $this->startDate,
            $this->awards
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='employee'>
                <div class=''>SAMPLE</div>
                <p>%s</p>
                <p>%f</p>
                <p>%s</p>
                <p>%s</p>
            </div>",
            $this->jobTitle,
            $this->salary,
            $this->startDate,
            $this->awards
        );
    }

    public function toMarkdown(): string {
        return " - Job Title: {$this->jobTitle}
                 - Salary: {$this->salary}
                 - Start Date: {$this->startDate}
                 - Awards: {$this->awards}";
    }
  
    public function toArray(): array {
        return  ['jobTitle' => $this->jobTitle,
                 'salary' => $this->salary,
                 'startDate' => $this->startDate,
                 'awards' => $this->awards];
    }

    public function getToUserString(): string {
        return $this->toUserString();
    }

    public function getToUserHTML(): string {
        return $this->toUserHTML();
    }

    public function getToUserMarkdown(): string {
        return $this->toUserMarkdown();
    }

    public function getToUserArray(): array {
        return $this->toUserArray();
    } 
}
?>