<style>
    /* Sticky header */
    header {
      position: sticky;
      top: 0;
      z-index: 10;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Add shadow effect */
    }

    /* Make footer sticky */
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1; /* Push footer to the bottom */
    }

    /* Increase logo size */
    header img {
      height: 80px;  /* You can adjust this value for the logo size */
    }
  </style>
<footer class="bg-sky-500 text-white p-4 flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <img alt="Kota Bontang logo" class="h-12" src="{{ asset('images/logo_bontang.png') }}" width="50"/>
      <p class="text-center text-white font-bold">Kota Bontang</p>
    </div>
    <div class="flex items-center justify-center w-fullpy-2 mt-2">
      <div class="flex items-center space-x-2 text-black">
        <img alt="CC Logo" src="https://cdn-icons-png.flaticon.com/128/9134/9134737.png" class="h-6 w-6"/>
        <p class="text-center">Muhamad Vicky Oktafrian</p>
      </div>
    </div>
  </footer>