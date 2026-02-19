<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <link rel="icon" href="./favicon.ico" type="image/x-icon">
    </head>
    {{--
        justify-center: `justify-content: center`
        flex: display: `flex`
        items-start: `align-items: flex-start`
        h-screen: `height: 100vh`
        m-0: `margin: 0`
    --}}
    <body class="flex justify-center items-center min-h-screen m-12 bg-(--main-bg-color) text-(--main-fg-color) font-mono">
        <main class="w-4xl">
            {{--
                flex: `display: flex`
                flex-col: `flex-direction: column`
                items-center: `align-items: center`
                justify-center: `justify-content: center`
                p-0: `padding: 0px`
                mt-120: `margin: 120px 0 0 0`
            --}}
            <div class="card flex flex-col items-center justify-center p-0 mt-0">
                {{--
                    block: `display: block`
                    w-full: `width: 100%`
                    h-full: `height: 100%`
                --}}
                {{--<canvas class="block w-full h-full" id="webgl-canvas"></canvas>--}}
                <div class="content">
                    {{--<h1 class="text-5xl mb-8">Ishan Agarwal</h1>--}}

                    <div class="flex items-center gap-4 mb-8">
                        <h1 class="text-5xl">Ishan Agarwal</h1>

                        <div class="flex items-center gap-3 text-sm">
                            <a href={{$socials->github}}
                               target="_blank"
                               class="hover:underline opacity-80 hover:opacity-100 transition">
                                GitHub
                            </a>

                            <a href={{$socials->upwork}}
                               target="_blank"
                               class="hover:underline opacity-80 hover:opacity-100 transition">
                                Upwork
                            </a>

                            <a href={{"mailto:$socials->email"}}
                               class="hover:underline opacity-80 hover:opacity-100 transition">
                               {{$socials->email}}
                            </a>
                        </div>
                    </div>

                    <p class="mb-6">
                        I am an Automation and Full Stack developer. I specialize in building web scrapers,
                        reverse engineering api's and building web apps in Django and Laravel. If you want something done
                        you can contact me on upwork.
                    </p>
                    {{--<p class="pb-6">--}}
                    <p>
                        In my free time I like working on embedded systems and graphics programming. I am familiar with
                        opengl, threejs and unreal engine.
                    </p>
                    <nav></nav>
                </div>
            </div>

            <div class="mt-6">
                <!-- Header -->
                <header class="mb-10">
                    <h1 class="text-3xl font-semibold">Client Projects</h1>
                    <p class="text-(--main-fg-color) mt-2">Selected work completed for clients on Upwork.</p>
                </header>
                <!-- Projects -->
                <section class="space-y-6">
                    <!-- Project -->
                    @foreach ($freelance_projects as $project)
                        <article class="border border-neutral-800 rounded-lg p-5 hover:border-neutral-600 transition">
                            <h2 class="text-lg font-medium">{{$project->title}}</h2>
                            <p class="text-(--main-fg-color) mt-1">
                                {{$project->description}}
                            </p>
                            <div class="mt-2 text-sm text-(--main-fg-color)">{{$project->technologies}}</div>
                        </article>
                    @endforeach
                </section>
            </div>

            <div class="mt-6">
                <!-- Header -->
                <header class="mb-10">
                    <h1 class="text-3xl font-semibold">Personal Projects</h1>
                    <p class="text-(--main-fg-color) mt-2">Personal Projects built by me.</p>
                </header>
                <!-- Projects -->
                <section class="space-y-6">
                    <!-- Project -->
                    @foreach ($personal_projects as $project)
                        <article class="border border-neutral-800 rounded-lg p-5 hover:border-neutral-600 transition">
                            <h2 class="text-lg font-medium">{{$project->title}}</h2>
                            <p class="text-(--main-fg-color) mt-1">
                                {{$project->description}}
                            </p>
                            <div class="mt-2 text-sm text-(--main-fg-color)">{{$project->technologies}}</div>
                        </article>
                    @endforeach
                </section>
            </div>
        </main>
    </body>
</html>
