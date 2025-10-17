<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Admin & Petugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('admin.create') }}" class="inline-block rounded bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">
                            Tambah Admin
                        </a>
                    </div>

                    @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-100 p-4 text-sm text-green-700" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="text-left">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No.</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Username</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Role</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse ($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        {{ $loop->iteration + $users->firstItem() - 1 }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user->name }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user->username }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user->email }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        <span class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                                            {{ $user->role->name_role }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2">
                                        <!-- button aksi -->
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('admin.edit', $user) }}" class="inline-block rounded bg-indigo-600 p-2 text-white hover:bg-indigo-700">
                                                Edit
                                            </a>
                                            <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{ $user->id }}')" class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                                Hapus
                                            </button>
                                            <!-- Model konfirmasi delete -->
                                            <x-modal name="confirm-user-deletion-{{ $user->id }}" :show="$errors->userDeletion->has('password')" focusable>
                                                <form method="post" action="{{ route('admin.destroy', $user) }}" class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        Apakah Anda yakin ingin menghapus data ini?
                                                    </h2>

                                                    <p class="mt-1 text-sm text-gray-600">
                                                        Data pelamar "{{ $user->name }}" akan dihapus secara permanen.
                                                    </p>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Batal') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ml-3">
                                                            {{ __('Hapus Data') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                            <!-- end modal konfirmasi delete -->
                                        </div>
                                        <!-- end button aksi -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">
                                        Tidak ada data admin atau petugas untuk ditampilkan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Link Paginasi --}}
                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>