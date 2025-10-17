<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Pelamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('applicants.update', $applicant) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Method Spoofing untuk Update --}}

                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Pelamar</label>
                            <input type="text" name="name" id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name', $applicant->name) }}" autofocus>
                            @error('name')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="graduated_from" class="block font-medium text-sm text-gray-700">Lulusan Dari</label>
                            <input type="text" name="graduated_from" id="graduated_from" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('graduated_from', $applicant->graduated_from) }}">
                            @error('graduated_from')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gpa_score" class="block font-medium text-sm text-gray-700">IPK</label>
                            <input type="number" step="0.01" name="gpa_score" id="gpa_score" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('gpa_score', $applicant->gpa_score) }}">
                            @error('gpa_score')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="portofolio_notes" class="block font-medium text-sm text-gray-700">Catatan Portofolio</label>
                            <textarea name="portofolio_notes" id="portofolio_notes" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4">{{ old('portofolio_notes', $applicant->portofolio_notes) }}</textarea>
                            @error('portofolio_notes')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('applicants.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>