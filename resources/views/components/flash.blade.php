@if ( session()->has('message') )
    <div x-data="{show : true}"
         x-init="setTimeout(() => show = false,4000)"
         x-show="show"
         class="fixed bottom-3 right-3 bg-blue-500 text-white rounded-xl text-sm px-4 py-2 ">
        <p>{{ session('message') }}</p>
    </div>
@endif
