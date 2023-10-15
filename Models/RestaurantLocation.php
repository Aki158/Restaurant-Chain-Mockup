<?php

namespace Models;

use FileConvertible;

class RestaurantLocation implements FileConvertible{
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    public function __construct(
        string $name, string $address, string $city,
        string $state, string $zipCode, array $employees,
        bool $isOpen, bool $hasDriveThru
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    public function toString(): string {
        return sprintf(
            "Name: %s\nAddress: %s\nCity: %s\nState: %s\nzipCode: %s\nEmployees: %s\nisOpen: %d\nHasDriveThru: %d\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $this->employees,
            $this->isOpen,
            $this->hasDriveThru
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='Restaurant-Location'>
                <div class=''>SAMPLE</div>
                <p>%s</p>
                <p>%f</p>
                <p>%s</p>
                <p>%s</p>
            </div>",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $this->employees,
            $this->isOpen,
            $this->hasDriveThru
        );
    }

    public function toMarkdown(): string {
        return " - Name: {$this->name}
                 - Address: {$this->address}
                 - City: {$this->city}
                 - State: {$this->state}
                 - Zip Code: {$this->zipCode}
                 - Employees: {$this->employees}
                 - Is Open: {$this->isOpen}
                 - Has Drive Thru: {$this->hasDriveThru}";
    }
  
    public function toArray(): array {
        return  ['name' => $this->name,
                 'address' => $this->address,
                 'city' => $this->city,
                 'state' => $this->state,
                 'zipCode' => $this->zipCode,
                 'employees' => $this->employees,
                 'isOpen' => $this->isOpen,
                 'hasDriveThru' => $this->hasDriveThru];
    }
}
?>