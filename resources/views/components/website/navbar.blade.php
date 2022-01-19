        <!-- NAVBAR -->
        <div>
            <nav>
                <div class="flex flex-row justify-between px-32 py-4 shadow-md bg-white">
                    <div class="flex flex-row gap-3">
                        <a href="{{route('homepage')}}" class="hover:text-gray-200 transition">Home</a>
                        <a href="#" class="hover:text-gray-200 transition">About</a>
                        <a href="#" class="hover:text-gray-200 transition">Contact</a>
                    </div>
                    <div class="flex flex-row gap-3">
                        @auth
                            @if (Auth::user()->role == 'admin')
                            <a href="/admin" class="hover:text-gray-200 transition">Go to Admin</a>
                            @endif
                            <a href="/logout" class="hover:text-gray-200 transition" id="logoutButton">Logout</a>
                        @else
                        <a href="/login" class="hover:text-gray-200 transition">Login</a>
                        <a href="/register" class="hover:text-gray-200 transition">Register</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="post" id="logout" class="d-none">
            @csrf

        </form>
        <script>
            const logoutForm = document.getElementById('logout');
            const logoutButton = document.getElementById('logoutButton');
            logoutButton.addEventListener('click', (event) => {
                event.preventDefault();
                logoutForm.submit();
            })
        </script>
