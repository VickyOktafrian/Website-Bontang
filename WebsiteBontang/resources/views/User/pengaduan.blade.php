
    <script>
      // Initialize CKEditor
      document.addEventListener("DOMContentLoaded", function () {
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });
      });

      // File type validation
      const allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp", "video/mp4", "video/webm", "video/ogg"];

      // Open file dialog when clicking "Cari File"
      function openFileDialog() {
        document.getElementById("file_input").click();
      }

      // Handle file upload and display the uploaded files as icons and previews
      function handleFileUpload(event) {
        const files = event.target.files;
        validateAndAddFiles(files);
      }

      // Handle drag-and-drop upload
      function handleDragOver(event) {
        event.preventDefault();
        event.stopPropagation();
        event.currentTarget.classList.add("border-blue-500");
      }

      function handleDragLeave(event) {
        event.preventDefault();
        event.stopPropagation();
        event.currentTarget.classList.remove("border-blue-500");
      }

      function handleDrop(event) {
        event.preventDefault();
        event.stopPropagation();
        event.currentTarget.classList.remove("border-blue-500");

        const files = event.dataTransfer.files;
        validateAndAddFiles(files);
      }

      // Validate file types and add files to container
      function validateAndAddFiles(files) {
        const fileListContainer = document.getElementById("fileListContainer");

        Array.from(files).forEach(file => {
          if (!allowedTypes.includes(file.type)) {
            alert(`${file.name} tidak didukung. Hanya file gambar dan video yang diperbolehkan.`);
            return;
          }

          const fileIcon = document.createElement("div");
          fileIcon.classList.add("relative", "flex", "items-center", "space-x-2", "mb-4", "mr-4");

          // Create file preview based on file type
          const fileImg = document.createElement("img");
          fileImg.classList.add("w-16", "h-16", "object-cover", "rounded-lg");

          const deleteBtn = document.createElement("button");
          deleteBtn.innerHTML = '<i class="fas fa-times text-red-500"></i>';  // "X" icon for delete
          deleteBtn.classList.add("absolute", "top-0", "right-0", "text-2xl", "hover:text-red-700");
          deleteBtn.onclick = function () {
            fileListContainer.removeChild(fileIcon);
          };

          // Preview logic for images and videos
          const reader = new FileReader();
          reader.onload = function(e) {
            if (file.type.startsWith("image/")) {
              fileImg.src = e.target.result;
            } else if (file.type.startsWith("video/")) {
              fileImg.src = "https://storage.googleapis.com/a1aa/image/video-placeholder.png"; // Placeholder for video files
            }
          };

          // Read the file as a data URL
          reader.readAsDataURL(file);

          fileIcon.appendChild(fileImg);
          fileIcon.appendChild(deleteBtn);

          fileListContainer.appendChild(fileIcon);
        });
      }
    </script>
<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
        
  <div class="flex justify-center items-start min-h-screen bg-gray-100 pt-8">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-2xl">
      <h1 class="text-center text-xl font-bold mb-4">LAYANAN PENGADUAN</h1>
      <form action="{{ route('pengaduan.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4" name='bukti'>
          <label class="block text-gray-700 font-bold mb-2">Upload File</label>
          <div class="border-2 border-dashed border-gray-300 p-4 text-center rounded-xl"
               ondragover="handleDragOver(event)"
               ondragleave="handleDragLeave(event)"
               ondrop="handleDrop(event)">
            <i class="fas fa-upload text-2xl text-gray-400 mb-2"></i>
            <p>Seret dan Taruh Sini</p>
            <p>atau <a class="text-blue-500 cursor-pointer" onclick="openFileDialog()">Cari File</a></p>
            <!-- File input element (hidden, triggered by Cari File link) -->
            <input type="file" id="file_input" class="mt-2 hidden" name="bukti[]" multiple onchange="handleFileUpload(event)"/>
          </div>
        </div>

        <div id="fileListContainer" class="flex flex-wrap mb-4">
          <!-- Uploaded files will be shown here -->
        </div>

        <div class="mb-4" name='jenis_laporan'>
          <label class="block text-gray-700 font-bold mb-2">Jenis Laporan</label>
          <select class="w-full border border-gray-300 p-2 rounded-xl" name="jenis_laporan">
            <option value="" disabled selected>Pilih Jenis Laporan</option>
            <option value="Pengaduan Teknis">Pengaduan Teknis</option>
            <option value="Pengaduan Administratif">Pengaduan Administratif</option>
            <option value="Pengaduan Umum">Pengaduan Umum</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>

        <div class="mb-4 z-0">
          <textarea id="editor" name="keterangan"></textarea>
        </div>

        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl">
          Submit
        </button>
      </form>
    </div>
  </div>
</x-layout>


