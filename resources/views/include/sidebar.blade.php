<li class="header">MAIN NAVIGATION</li>
<li>
  <a href="/home">
    <i class="fa fa-dashboard"></i> <span>Module</span>
  </a>
</li>
@if (Auth::user()->role == 'admin')
  <li class="header">MANAGEMENTS</li>
  <li>
    <a href="/users">
      <i class="fa fa-book"></i> <span>Users</span>
    </a>
  </li>
  <li>
    <a href="/roles">
      <i class="fa fa-book"></i> <span>Roles</span>
    </a>
  </li>
  <li>
    <a href="/functions">
      <i class="fa fa-book"></i> <span>Functions</span>
    </a>
  </li>
  <li>
    <a href="/projects">
      <i class="fa fa-book"></i> <span>Projects</span>
    </a>
  </li>
@endif
<li class="header">LABELS</li>
<li>
  <a href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
      <i class="fa fa-circle-o text-red"></i>
      <span>{{ __('Logout') }}</span>
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</li>