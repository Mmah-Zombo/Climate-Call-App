<x-app-layout>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <div class="w-full px-4 py-2 border-l-2 border-amethyst bg-honeydew text-amethyst">
                <p>Plants are very important in the fight against adverse climate change. Thus this section has been developed to give you a fair knowledge of the basic care needed for various type of plants. This knowledge will act as your starter guide to grow them.</p>
            </div>

            <div class="w-full h-fit md:grid grid-cols-4 gap-5 mt-10" id="plant-list">
                {{-- Dynamic content --}}
            </div>

            <ul class="pagination list-none flex m-4 w-full" id="pagination">
                <p id="prev" class="bg-white px-4 py-2 mr-4 rounded text-amethyst hover:cursor-pointer">Prev</p>
                <p id="current" class="bg-white px-4 py-2 mr-4 rounded text-amethyst hover:cursor-pointer">Current page</p>
                <p id="next" class="bg-white px-4 py-2 mr-4 rounded text-amethyst hover:cursor-pointer">Next</p>
                <p id="total" class="font-bold px-4 py-2 mr-4 rounded text-amethyst hover:cursor-pointer">Total pages</p>
            </ul>
        </div>
    </div>
    <script type="module" src="{{ asset('client/js/plants.js') }}"></script>
</x-app-layout>