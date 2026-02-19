<?php

namespace App\DTO;

final readonly class SocialsDTO {
    public function __construct(
        public string $email,
        public string $upwork,
        public string $github,
    ){}
}
