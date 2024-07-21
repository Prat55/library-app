<div class="mt-3 text-center">
    @include('frontend.message')

    <button type="button" class="btn btn-sm btn-outline-primary d-flex justify-content-center align-items-center"
        wire:click="bookNow()">
        <div wire:loading.remove="bookNow">
            Book Now
        </div>
        <div style="height:50px;width:50px" wire:loading="bookNow">
            <img src="{{ asset('user-assets/images/loader/loader.gif') }}" alt="loader" width="100%" height="100%">
        </div>
    </button>
</div>
