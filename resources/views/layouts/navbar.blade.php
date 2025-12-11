<div class="navbar bg-white/60 backdrop-blur-xl shadow-md fixed top-0 z-50 px-4">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle hover:bg-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>

            <!-- MENU -->
            <ul tabindex="0"
                class="menu menu-md dropdown-content mt-3 p-4 shadow-lg bg-white/70 backdrop-blur-xl rounded-xl w-56 border border-gray-200 text-black">

                <!-- HOME -->
                <li>
                    <a href="{{ url('/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M240,208H224V136l2.34,2.34A8,8,0,0,0,237.66,127L139.31,28.68a16,16,0,0,0-22.62,0L18.34,127a8,8,0,0,0,11.32,11.31L32,136v72H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM48,120l80-80,80,80v88H160V152a8,8,0,0,0-8-8H104a8,8,0,0,0-8,8v56H48Zm96,88H112V160h32Z">
                            </path>
                        </svg>
                        Homepage
                    </a>
                </li>

                <!-- DASHBOARD -->
                <li>
                    <a href="{{ url('dashboard/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z">
                            </path>
                        </svg>
                        Dashboard
                    </a>
                </li>

                {{-- ADMIN --}}
                @if (Auth::user()->role == 'Administrator')
                <li>
                    <a href="{{ url('users/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212Z">
                            </path>
                        </svg>
                        Module Users
                    </a>
                </li>

                <li>
                    <a href="{{ url('pets/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M239.71,125l-16.42-88a16,16,0,0,0-19.61-12.58l-.31.09L150.85,40h-45.7L52.63,24.56l-.31-.09A16,16,0,0,0,32.71,37.05L16.29,125a15.77,15.77,0,0,0,9.12,17.52A16.26,16.26,0,0,0,32.12,144,15.48,15.48,0,0,0,40,141.84V184a40,40,0,0,0,40,40h96a40,40,0,0,0,40-40V141.85a15.5,15.5,0,0,0,7.87,2.16,16.31,16.31,0,0,0,6.72-1.47A15.77,15.77,0,0,0,239.71,125ZM32,128h0L48.43,40,90.5,52.37Zm144,80H136V195.31l13.66-13.65a8,8,0,0,0-11.32-11.32L128,180.69l-10.34-10.35a8,8,0,0,0-11.32,11.32L120,195.31V208H80a24,24,0,0,1-24-24V123.11L107.92,56h40.15L200,123.11V184A24,24,0,0,1,176,208Zm48-80L165.5,52.37,207.57,40,224,128ZM104,140a12,12,0,1,1-12-12A12,12,0,0,1,104,140Zm72,0a12,12,0,1,1-12-12A12,12,0,0,1,176,140Z">
                            </path>
                        </svg>
                        Module Pets
                    </a>
                </li>

                <li>
                    <a href="{{ url('adoptions/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                            </path>
                        </svg>
                        Module Adoptions
                    </a>
                </li>

                @else
                <li>
                    <a href="{{ url('myprofile/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,112a8,8,0,0,1-8,8H152a8,8,0,0,1,0-16h40A8,8,0,0,1,200,112Zm-8,24H152a8,8,0,0,0,0,16h40a8,8,0,0,0,0-16Zm40-80V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56ZM216,200V56H40V200H216Zm-80.26-34a8,8,0,1,1-15.5,4c-2.63-10.26-13.06-18-24.25-18s-21.61,7.74-24.25,18a8,8,0,1,1-15.5-8,39.84,39.84,0,0,1,17.19-23.34,32,32,0,1,1,45.12,0A39.76,39.76,0,0,1,135.75,166ZM96,136a16,16,0,1,0-16-16A16,16,0,0,0,96,136Z">
                            </path>
                        </svg>
                        My profile
                    </a>
                </li>

                <li>
                    <a href="{{ url('makeadoption/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z">
                            </path>
                        </svg>
                        Make Adoptions
                    </a>
                </li>

                <li>
                    <a href="{{ url('myadoptions/') }}" class="flex items-center gap-2 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                            viewBox="0 0 256 256">
                            <path
                                d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                            </path>
                        </svg>
                        My Adoptions
                    </a>
                </li>
                @endif

                <!-- LOGOUT -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:;" class="flex items-center gap-2 hover:text-red-600"
                            onclick="event.preventDefault(); this.closest('form').submit();">

                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-black" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z">
                                </path>
                            </svg>
                            Log Out
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- LOGO -->
    <div class="navbar-center">
        <a class="btn btn-ghost normal-case text-2xl font-bold text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" viewBox="0 0 256 256">
                <path
                    d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
                </path>
            </svg>
            LaraPets
        </a>
    </div>

    <!-- PERFIL -->
    <div class="navbar-end">
        <div class="avatar">
            <div class="mask mask-squircle w-10 border-2 border-black shadow">
                <img src="{{ asset('photos/' . Auth::user()->photo) }}" alt="">
            </div>
        </div>

        <span class="ml-3 font-medium text-black">
            {{ Auth::user()->fullname }}
        </span>

        <span class="mx-4 text-black md:block hidden font-semibold">|</span>

        <span class="me-4 text-black md:block hidden font-semibold">
            {{ Auth::user()->role }}
        </span>
    </div>
</div>