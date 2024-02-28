<div class="d-flex justify-content-center align-items-center">
    <input type="text" class="rounded form-control" placeholder="Serach books here..." x-model='query' autofocus>
    <button class="btn btn-primary ms-1" x-on:click="$dispatch('search', {
                search: query
             })">
        <i class="cursor-pointer fa-solid fa-magnifying-glass"></i>
    </button>
</div>
