<aside class="text-bg-dark">
    <ul>
        {{-- link home --}}
        <li><a href="{{ route('admin.home') }}"><i class="fa-solid fa-house"><span class="ms-1">Home</span></i></a></li>
        {{-- link post --}}
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa-solid fa-signs-post"><span
                        class="ms-1">Post</span></i></a></li>
        <li><a href=" {{ route('admin.posts.create') }}"><i class="fa-solid fa-plus"><span class="ms-1">Nuovo
                        Post</span></i></a></li>
        {{-- link project --}}
        <li><a href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-folder"><span
                        class="ms-1">Progetti</span></i></a></li>
        <li><a href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus"><span class="ms-1">Nuovo
                        Progetto</span></i></a></li>
        {{-- link technology --}}
        <li><a href="{{ route('admin.technologies.index') }}"><i class="fa-solid fa-microchip"><span
                        class="ms-1">Technologia</span></i></a></li>
        <li><a href="{{ route('admin.technologies.create') }}"><i class="fa-solid fa-plus"><span class="ms-1">Nuova
                        technologia</span></i></a></li>


    </ul>
</aside>
