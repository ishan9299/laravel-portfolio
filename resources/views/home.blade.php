<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'ishanagarwal.xyz') }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <link rel="icon" href="./favicon.ico" type="image/x-icon">
    </head>

    <body class="flex justify-center items-center min-h-screen mx-auto px-6 py-16 bg-(--main-bg-color) text-(--main-fg-color) font-mono">
        <main class="w-full max-w-3xl">

            {{-- Intro / Hero --}}
            <div class="mb-16">
                <div class="content">

                    <div class="flex flex-col sm:flex-row sm:items-baseline gap-2 sm:gap-6 mb-6">
                        <h1 class="text-4xl font-bold tracking-tight">Ishan Agarwal</h1>

                        <div class="flex items-center gap-4 text-sm text-(--main-fg-color-muted)">
                            <a href={{$socials->github}}
                               target="_blank"
                               class="font-semibold hover:text-(--main-fg-color) hover:underline transition">
                               GitHub
                            </a>

                            <a href={{$socials->upwork}}
                               target="_blank"
                               class="font-semibold hover:text-(--main-fg-color) hover:underline transition">
                               Upwork
                            </a>

                            <a href={{"mailto:$socials->email"}}
                               class="font-semibold hover:text-(--main-fg-color) hover:underline transition">
                               {{$socials->email}}
                            </a>
                        </div>
                    </div>

                    <p class="mb-4 leading-relaxed text-(--main-fg-color) max-w-2xl">
                        I am an Automation and Full Stack developer. I specialize in building web scrapers,
                        reverse engineering APIs and building web apps in Django and Laravel. If you want something done
                        you can contact me on Upwork.
                    </p>

                    <p class="leading-relaxed text-(--main-fg-color) max-w-2xl">
                        In my free time I like working on embedded systems and graphics programming. I am familiar with
                        OpenGL, Three.js and Unreal Engine.
                    </p>
                </div>
            </div>

            {{-- Client Projects --}}
            <div class="mb-16">
                <header class="mb-8">
                    <h2 class="text-2xl font-bold tracking-tight">Client Projects</h2>
                    <p class="text-(--main-fg-color-muted) mt-1 text-sm">Selected work completed for clients on Upwork.</p>
                </header>

                <section class="space-y-4">
                    @foreach ($freelance_projects as $project)
                        <article class="border border-(--main-border-color) rounded-lg px-6 py-5 hover:border-(--main-border-hover) transition">
                            <h3 class="text-base font-bold">{{$project->title}}</h3>
                            <p class="text-(--main-fg-color) mt-2 leading-relaxed text-sm">
                                {{$project->description}}
                            </p>
                            <div class="mt-3 text-xs text-(--main-fg-color-muted) font-semibold tracking-wide">{{$project->technologies}}</div>
                        </article>
                    @endforeach
                </section>
            </div>

            {{-- Personal Projects --}}
            <div class="mb-16">
                <header class="mb-8">
                    <h2 class="text-2xl font-bold tracking-tight">Personal Projects</h2>
                    <p class="text-(--main-fg-color-muted) mt-1 text-sm">Personal projects built by me.</p>
                </header>

                <section class="space-y-4">
                    @foreach ($personal_projects as $project)
                        <article class="border border-(--main-border-color) rounded-lg px-6 py-5 hover:border-(--main-border-hover) transition">
                            <h3 class="text-base font-bold">{{$project->title}}</h3>
                            <p class="text-(--main-fg-color) mt-2 leading-relaxed text-sm">
                                {{$project->description}}
                            </p>
                            <div class="mt-3 text-xs text-(--main-fg-color-muted) font-semibold tracking-wide">{{$project->technologies}}</div>
                        </article>
                    @endforeach
                </section>
            </div>

        </main>
    </body>
</html>
