
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav w-100">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('material.list') }}">Materials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('category.list') }}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('inward.create') }}">Material In-out</a>
      </li>
      <li class="nav-item ms-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link active :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
      </li>
    </ul>
  </div>
</nav>