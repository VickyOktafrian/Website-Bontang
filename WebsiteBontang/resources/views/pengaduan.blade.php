<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Layanan Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
      // Initialize CKEditor
      document.addEventListener("DOMContentLoaded", function () {
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });
      });
    </script>
    <style>
      /* Sticky header */
      header {
        position: sticky;
        top: 0;
        z-index: 10;
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
    </style>
  </head>
  <body class="bg-blue-100">
    <header class="bg-white p-4 flex justify-between items-center">
      <img alt="Ini Nah! logo" class="h-12" src="https://storage.googleapis.com/a1aa/image/ajf5gpXVTY2JBqyp2xTqS9coJAhK8FqIW4YdDGOcnpL0mF9JA.jpg" width="100"/>
      <div class="bg-blue-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
        V
      </div>
    </header>

    <main class="flex flex-col items-center mt-8 mb-8">
      <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-2xl">
        <h1 class="text-center text-xl font-bold mb-4">LAYANAN PENGADUAN</h1>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Upload Files</label>
          <div class="border-2 border-dashed border-gray-300 p-4 text-center rounded-xl">
            <i class="fas fa-upload text-2xl text-gray-400 mb-2"></i>
            <p>Seret dan Taruh Sini</p>
            <p>atau <a class="text-blue-500" href="#">Cari File</a></p>
          </div>
        </div>

        <div class="flex space-x-2 mb-4">
          <img alt="File icon" class="w-10 h-10" src="https://storage.googleapis.com/a1aa/image/sXlbPyxfxZSvW671DeuTpCfPE1bu6DlU1df40fLlLZqJtZRfE.jpg" width="40"/>
          <img alt="File icon" class="w-10 h-10" src="https://storage.googleapis.com/a1aa/image/sXlbPyxfxZSvW671DeuTpCfPE1bu6DlU1df40fLlLZqJtZRfE.jpg" width="40"/>
          <img alt="File icon" class="w-10 h-10" src="https://storage.googleapis.com/a1aa/image/sXlbPyxfxZSvW671DeuTpCfPE1bu6DlU1df40fLlLZqJtZRfE.jpg" width="40"/>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Keterangan</label>
          <select class="w-full border border-gray-300 p-2 rounded-xl">
            <option value="" disabled selected>Pilih Keterangan</option>
            <option value="Pengaduan Teknis">Pengaduan Teknis</option>
            <option value="Pengaduan Administratif">Pengaduan Administratif</option>
            <option value="Pengaduan Umum">Pengaduan Umum</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
        <div class="mb-4">
          <textarea id="editor" name="editor"></textarea>
        </div>

        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl">
          Submit
        </button>
      </div>
    </main>

    <footer class="bg-sky-500 text-white p-4 flex justify-between items-center">
      <img alt="Kota Bontang logo" class="h-12" src="https://storage.googleapis.com/a1aa/image/f9KJ9jFuQs1iYK3ib23QiF0fBanse2l6ptqPPLLOWJvMbW0nA.jpg" width="50"/>
      <p class="text-center">Muhamad Vicky Oktafrian</p>
    </footer>
  </body>
</html>