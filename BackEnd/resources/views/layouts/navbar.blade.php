<nav class="bg-blue-900 w-full flex-nowrap justify-start">
    <div class="ml-auto mr-auto p-7 grid grid-cols-1 sm:grid-cols-3 relative">

        <div class="flex sm:items-center justify-center col-span-1 sm:col-start-1 inline sm:absolute sm:inset-y-0 sm:right-0 sm:mr-6">
            <a href="/">
                <img class="w-12" src="{{asset('/images/logo/JS.png')}}" alt="logo">
            </a>
        </div>

        <div class="flex items-center justify-center lg:justify-start inline col-span-1 sm:col-start-2 space-x-6 mb-5 sm:mb-0">
            <a class="font-bold text-white" href="/categoria/cursos">Cursos</a>
            <a class="font-bold text-white" href="/categoria/gameplay">Gameplay</a>
            <a class="font-bold text-white" href="/categoria/vlogs">Vlogs</a>
            <a class="font-bold text-white" href="/contactame">Sobre mí</a>
        </div>

        <form class="flex justify-self-start md:justify-self-end lg:justify-self-start lg:w-1/2 col-span-1 w-full md:w-3/4" action="{{ route('search') }}">
            <input class="flex-1 appearance-none border border-transparent py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-l-3xl w-full md:w-3/4 lg:w-1/2" type="text" name="search" placeholder="Buscar..." required>
            <button type="submit" class="flex-shrink-0 bg-blue-600 text-white text-base font-semibold py-2 px-4 shadow-md rounded-r-3xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</nav>
