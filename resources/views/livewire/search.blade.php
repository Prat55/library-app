<div class="d-flex justify-content-center align-items-center">

    <input type="text" class="rounded form-control" name="search" placeholder="Serach anything here..." x-model='query'
        autofocus>
    <button class="btn btn-primary ms-1" x-on:click="$dispatch('search', {
                search: query
             })"
        type="button">
        <i class="cursor-pointer fa-solid fa-magnifying-glass"></i>
    </button>
</div>
