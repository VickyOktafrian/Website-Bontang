<style>
    /* Sticky header */
    header {
      position:sticky;
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
<header class="bg-white p-4 flex justify-between items-center">
    <a href="#"><img alt="Ini Nah! logo" class="h-16" src="{{ asset('images/logo.png') }}" width="auto" height="80px"/></a>
    <div class="bg-blue-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
      V
    </div>
  </header>