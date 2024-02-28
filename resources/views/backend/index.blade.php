<x-app-layout>
    @section('title')
        Dashboard
    @endsection
    <!-- Row-1 -->
    @livewire('dashboard1')
    <!-- End Row-1 -->
    <!-- Row-2 -->
    @livewire('dashboard-message')
    <!-- End Row-2 -->
</x-app-layout>
