<nav class="bg-slate-50 border border-gray-300 fixed top-0 left-0 w-full z-50" x-data="{ isOpen: false, cartCount: 3, showCart: false, cartItems: [{ id: 1, name: 'Item A', price: 20, quantity: 1 }, { id: 2, name: 'Item B', price: 50, quantity: 2 }] }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <a href="{{ '/' }}"><img class="size-20" src="{{ asset('images/logo.png') }}" alt="Ini,Nah!"></a>
          </div>
        </div>
        
        <div class="flex flex-wrap w-full items-center">
          <input type="text" placeholder="Search something..." class="xl:w-80 max-lg:hidden lg:ml-10 max-md:mt-4 max-lg:ml-4 bg-gray-100 border focus:bg-transparent px-4 rounded h-10 outline-none text-sm transition-all" />
          
          <div class="ml-auto flex items-center space-x-4">
            <!-- Cart Button -->
            <a href="{{ route('cart.index') }}" class="btn btn-primary">
            <button @click="showCart = !showCart" class="relative mr-10 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline" viewBox="0 0 512 512">
                <path d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zM150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm167 15c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0" data-original="#000000"></path>
              </svg>
            </button></a>
            
            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ isOpen: false }" @click.away="isOpen = false">
              <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="size-8 rounded-full" src="https://c1.klipartz.com/pngpicture/405/222/sticker-png-copyright-symbol-logo-person-persona-human-black-black-and-white-circle.png" alt="">
              </button>
              <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none border border-gray-300" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="{{ route('profil.edit') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="{{ route('orderan') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Order Saya</a>

                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button  class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</button></form>
                              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
