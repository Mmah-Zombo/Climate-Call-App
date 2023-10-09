<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('display')}}" method="post" class="w-full h-fit flex items-center justify-center bg-white opacity-90 rounded-full border-2 border-opacity-50 focus-within:border-celadon">
                @csrf
                <input type="text" name="location" id="location" class="rounded-full bg-transparent outline-none border-none w-full h-10 md:h-16 text-xl md:text-2xl p-4 pl-5 md:pl-9 focus:outline-none focus:ring-transparent focus:border-none" placeholder="Enter the region or area">
                <button type="submit">
                    <div class="flex items-center justify-center text-white h-10 md:h-14 w-20 md:w-14 mr-2 rounded-full bg-gradient-to-tr from-celadon to-teal-600"></div>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
