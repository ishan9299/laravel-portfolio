<?php

namespace App\DTO;

final readonly class ProjectDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public string $technologies,
    ){}
}
