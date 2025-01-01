<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="w-full min-h-screen py-1">
        <div class="p-0 md:p-4">
            <div class="w-full px-0 pb-8 mt-8 sm:max-w-full sm:rounded-lg">
                <h2 class="pl-6 text-2xl font-bold sm:text-xl text-sky-800">Edit Profil</h2>

              

                    <div class="sm:mt-8 sm:ml-8">
                        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
                            <table class="min-w-full table-auto text-sm text-left">
                                <thead>
                                    <tr class="border-b">
                                        <th class="px-4 py-2 text-sky-500">Data</th>
                                        <th class="px-4 py-2 text-sky-500">Isi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td class="px-4 py-2 text-sky-500">Nama Kamu</td>
                                        <td class="px-4 py-2">{{ $user->name }}</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="px-4 py-2 text-sky-500">Username</td>
                                        <td class="px-4 py-2">{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-sky-500">Email Kamu</td>
                                        <td class="px-4 py-2">{{ $user->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="items-center mt-8 sm:mt-14 text-sky-500">
                        <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                            <div class="w-full">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-sky-500 dark:text-white">Nama Kamu</label>
                                <input type="text" name="name" id="name"
                                    class="bg-sky-50 border border-sky-300 text-sky-500 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    placeholder="Nama Kamu" value="{{ old('name', $user->name) }}" required>
                            </div>
                        </div>
                        <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                            <div class="w-full">
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-sky-500 dark:text-white">Username Kamu</label>
                                <input type="text" name="username" id="username"
                                    class="bg-sky-50 border border-sky-300 text-sky-500 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    placeholder="Username Kamu" value="{{ old('username', $user->username) }}" required>
                            </div>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-sky-500 dark:text-white">Email Kamu</label>
                            <input type="email" name="email" id="email"
                                class="bg-sky-50 border border-sky-300 text-sky-500 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                placeholder="Email Kamu" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-sky-500 focus:ring-4 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2 border-sky-500 bg-sky-500 focus:z-10 hover:text-white hover:bg-sky-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
