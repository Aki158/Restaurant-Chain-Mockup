<?php

namespace Models;
use FileConvertible;

class RestaurantChain extends Company implements FileConvertible{
    private int $chainId;
    private array $restaurantLocation;
    private string $cuisineType;
    private int $numberOfLocation;
    private string $parentCompany;

    public function __construct(
        int $chainId, array $restaurantLocation, string $cuisineType,
        int $numberOfLocation,string $parentCompany
    ) {
        $this->chainId = $chainId;
        $this->restaurantLocation = $restaurantLocation;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocation = $numberOfLocation;
        $this->parentCompany = $parentCompany;
    }

    public function toString(): string {
        return sprintf(
            "Chain Id: %d\nRestaurant Locations: %s\nCuisine Type: %s\nNumber Of Location: %d\nParent Company: %s\n",
            $this->chainId,
            $this->restaurantLocation,
            $this->cuisineType,
            $this->numberOfLocation,
            $this->parentCompany
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='restaurant-chain'>
                <p>%d</p>
                <p>%s</p>
                <p>%s</p>
                <p>%d</p>
                <p>%s</p>
            </div>",
            $this->chainId,
            $this->restaurantLocation,
            $this->cuisineType,
            $this->numberOfLocation,
            $this->parentCompany
        );
    }

    public function toMarkdown(): string {
        return " - Chain Id: {$this->chainId}
                 - Restaurant Location: {$this->restaurantLocation}
                 - Cuisine Type: {$this->cuisineType}
                 - Number Of Location: {$this->numberOfLocation}
                 - Parent Company: {$this->parentCompany}";
    }
  
    public function toArray(): array {
        return [
            'chainId' => $this->chainId,
            'restaurantLocation' => $this->restaurantLocation,
            'cuisineType' => $this->cuisineType,
            'numberOfLocation' => $this->numberOfLocation,
            'parentCompany' => $this->parentCompany
        ];        
    }
}
?>