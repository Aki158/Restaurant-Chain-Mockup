<?php

namespace Models;

class Company{
    private string $name;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industry;
    private string $ceo;
    private bool $isPublicityTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

    public function __construct(
        string $name, int $foundingYear, string $description,
        string $website, string $phone, string $industry,
        string $ceo, bool $isPublicityTraded, string $country,
        string $founder, int $totalEmployees
    ) {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPublicityTraded = $isPublicityTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
    }

    public function toCompanyString(): string {
        return sprintf(
            "name: %s\nFounding Year: %d\ndescription: %s\nwebsite: %d\nphone: %s\nindustry: %s\nceo: %s\nisPublicityTraded: %d\ncountry: %s\nfounder: %s\ntotalEmployees: %d\n",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPublicityTraded,
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toCompanyHTML(): string {
        return sprintf("
            <div class='company'>
                <p>Name: %s</p>
                <p>Founding Year: %d</p>
                <p>Description: %s</p>
                <p>Website: %s</p>
                <p>Phone: %s</p>
                <p>Industry: %s</p>
                <p>CEO: %s</p>
                <p>Is Publicity Traded: %d</p>
                <p>Country: %s</p>
                <p>Founder: %s</p>
                <p>Total Employees: %d</p>
            </div>",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPublicityTraded,
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toCompanyMarkdown(): string {
        return " - Name: {$this->name}
                 - Founding Year: {$this->foundingYear}
                 - Description: {$this->description}
                 - Website: {$this->website}
                 - Phone: {$this->phone}
                 - Industry: {$this->industry}
                 - CEO: {$this->ceo}
                 - Is Publicity Traded: {$this->isPublicityTraded}
                 - Country: {$this->country}
                 - Founder: {$this->founder}
                 - Total Employees: {$this->totalEmployees}";
    }
  
    public function toCompanyArray(): array {
        return  ['name' => $this->name,
                 'foundingYear' => $this->foundingYear,
                 'description' => $this->description,
                 'website' => $this->website,
                 'phone' => $this->phone,
                 'industry' => $this->industry,
                 'ceo' => $this->ceo,
                 'isPublicityTraded' => $this->isPublicityTraded,
                 'country' => $this->country,
                 'founder' => $this->founder,
                 'totalEmployees' => $this->totalEmployees];
    }
}
?>