<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\ProjectDTO;
use App\DTO\SocialsDTO;

// this will contain the structure for out projects
class ProjectController extends Controller
{
    public function show()
    {
        $freelance_projects = [
            new ProjectDTO(
                'Real Estate Article Automation',
                'Automate generating Real Estate Articles from online listings like zillow with an Image selection interface.',
                'Python · Nodejs · Reactjs · curl_cffi',
            ),
            new ProjectDTO(
                'Job Board Data Scraping Specialist',
                'Created scrapers for nofluffjobs and justjoin.it',
                'Python · curl_cffi',
            ),
            new ProjectDTO(
                'Web scraping from Various Platforms.',
                'Created scrapers for various websites like amibition box, glassdoor, 99acres.com',
                'Python · curl_cffi · seleniumbase',
            ),
        ];

        $personal_projects = [
            new ProjectDTO(
                'Software Renderer',
                'It is a software renderer written from scratch. It also implemented the math function and a obj file parser to build the renderer.',
                'C · win32',
            ),
            new ProjectDTO(
                'OpenGL Editor',
                'A really bare bones text editor built using opengl.',
                'C · win32',
            ),
        ];

        $socials = new SocialsDTO(
            'ishan365.ia@gmail.com',
            'https://www.upwork.com/freelancers/~01ad9c9de3d8083c39',
            'https://www.github.com/ishan9299',
        );

        return view("home", [
            'freelance_projects' => $freelance_projects,
            'personal_projects' => $personal_projects,
            'socials' => $socials,
        ]);
    }
}
