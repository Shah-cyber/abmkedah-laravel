<x-non-member-layout>
    <h1>Welcome. This is the homepage.</h1> 

    @if(session('success'))
        <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif

    

    
    
</x-non-member-layout>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include your custom JS file -->


