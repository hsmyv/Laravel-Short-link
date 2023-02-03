<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Name -->
                    <div>
                        <form method="POST" action="{{ route('link.create') }}">
                            @csrf
                            <x-label for="link" :value="__('Link')" />
                            <x-input id="link" class="block mt-1 w-full" type="url" name="link"
                                :value="old('link')" required autofocus />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-4">
                        <x-label for="link" :value="__('Links')" />
                        <div class="p-5">


                            @foreach (Auth()->user()->links as $link)
                                @if ($link->created_at->addDays(60) > now())
                                    <div class="relative flex items-center mt-5">
                                        <div class="mr-auto">
                                            <input type="url" value="shrtlink/{{ $link->short_link }}"
                                                id="myLink_{{ $link->id }}">
                                            <button
                                                class="button button--sm border text-gray-700 dark:border-dark-5 dark:text-gray-300 ml-auto"
                                                onclick="myFunction('myLink_{{ $link->id }}')">Copy </button>
                                            <a target="_blank" class="buttonlink"
                                                href="{{ route('link.show', $link->short_link) }}" value=""
                                                id="{{ $link->id }}" name="link" class="font-medium">view</a>
                                            <div class="text-gray-600 mr-5 sm:mr-5"><a>Expire day:
                                                </a>{{ $link->created_at->addDays(60)->toDateTimeString() }}</div>


                                        </div>
                                        <div class="font-medium text-gray-700 dark:text-gray-500"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            function myFunction(inputId) {
                var copyText = document.getElementById(inputId);
                copyText.select();
                copyText.focus();
                copyText.setSelectionRange(0, 99999); // For mobile devices
                navigator.clipboard.writeText(copyText.value);
            }
        </script>
</x-app-layout>
