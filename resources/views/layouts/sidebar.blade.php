<aside id="logo-sidebar" class="fixed top-0 left-0 w-20 h-screen" aria-label="Sidebar">
   <div class="h-full py-4 overflow-y-auto overflow-x-hidden pl-2 bg-[#197DD9]">
      <a class="flex items-center pl-3 mb-8">
         <img src="{{ asset('assets/logo.png') }}" class="h-10 mr-8" alt="Samlong Logo" />
         <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Samlong</span>
      </a>
      <ul class="space-y-2 ml-2">
         @if(Auth::check() || Auth::guard('guru')->check())
         <li>
            <a href="/home" class="flex items-center py-2 pl-2 mb-5 text-base font-normal text-white rounded-lg hover:font-bold">
               <img src="{{ asset('assets/home.png') }}" alt="Home">
               <span class="ml-8 {{ $title === 'Halaman Home' ? 'font-bold' : '' }}">Home</span>
            </a>
         </li>
         <li>
            <a href="/devosi" class="flex items-center py-2 pl-2 mb-5 text-base font-normal text-white rounded-lg hover:font-bold">
               <img src="{{ asset('assets/christian-cross.png') }}" alt="Christian Cross">
               <span class="ml-8 {{ $title === 'Halaman Devosi' ? 'font-bold' : '' }}">Devosi</span>
            </a>
         </li>
         <li>
            <a href="/pembelajaran" class="flex items-center py-2 pl-2 mb-5 text-base font-normal text-white rounded-lg hover:font-bold">
               <img src="{{ asset('assets/graduation.png') }}" alt="Graduation">
               <span class="ml-8 {{ $title === 'Halaman Pembelajaran' || $title === 'Halaman Tugas' ? 'font-bold' : '' }}">Pembelajaran</span>
            </a>
         </li>
         @endif
         @if(Auth::check())
         <li>
            <a href="/magang" class="flex items-center py-2 pl-2 mb-5 text-base font-normal text-white rounded-lg hover:font-bold">
               <img src="{{ asset('assets/bookmark.png') }}" alt="Graduation" class="w-8">
               <span class="ml-8 {{ $title === 'Halaman Magang' ? 'font-bold' : '' }}">Magang</span>
            </a>
         </li>
         @endif
         @if(Auth::check() || Auth::guard('guru')->check() || Auth::guard('bos')->check())
         <li>
            <form action="{{ route('logout') }}" method="GET">
                <button class="flex items-center py-2 pl-1 mb-5 text-base font-normal focus:outline-none text-white rounded-lg hover:font-bold">
                   <img src="{{ asset('assets/logout.png') }}" class="h-10" alt="Logout">
                   <span class="ml-8">Logout</span>
                </buttom>
            </form>
         </li>
         @endif
      </ul>
   </div>
</aside>

<script>
   $(document).ready(function() {
      $('#logo-sidebar').hover(function() {
         $(this).css('width', '16rem')
         $(this).css('transition', '0.4s')
      }, function() {
         $(this).css('width', '5rem')
      })
   })
</script>