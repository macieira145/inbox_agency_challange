<?php

namespace models {
    class Product
    {
        // properties
        public string $description;
        public string $details;
        public float $unitPrice;

        // Constructor
        function __construct(string $description, string $details, float $unitPrice)
        {
            $this->description = $description;
            $this->details = $details;
            $this->unitPrice = $unitPrice;
        }

        #region Getters And Setters
        // getters and setters
        function getDescription(): string
        {
            return $this->description;
        }

        function setDescription(string $value)
        {
            $this->description = $value;
        }

        function getDetails(): string
        {
            return $this->details;
        }

        function setDetails(string $value)
        {
            $this->details = $value;
        }

        function getUnitPrice(): float
        {
            return $this->unitPrice;
        }

        function setUnitPrice(float $value)
        {
            $this->unitPrice = $value;
        }
        #endregion
    }
}
