@php
    use Carbon\Carbon;
@endphp
<div>
    <h1 class="py-4 text-center text-3xl"> {{ Carbon::today()->locale('fr')->isoFormat('LL') }}</h1>
    <div class="container mx-auto my-10 max-w-xl px-4">
        <form wire:submit.prevent="submit">
            {{ $this->form }}

            <button
                type="submit"
                class="mr-2 mt-4 mb-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200"
            >
                Submit
            </button>
        </form>
    </div>
</div>
