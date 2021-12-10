<div class="relative justify-center inline-flex  bg-gray-100 rounded-xl px-3 py-2">
    <form method="GET" action="#">
        <input type="text"
            name="search"
            placeholder="Find something"
            class="bg-transparent placeholder-black font-semibold text-sm"
            value="{{ request('search') }}"
        >
    </form>
</div>
