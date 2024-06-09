<!-- JS Plugins -->
<script src="{{ asset('assets/client/plugins/jQuery/jquery.min.js')}}"></script>

<script src="{{ asset('assets/client/plugins/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{ asset('assets/client/plugins/slick/slick.min.js')}}"></script>

<script src="{{ asset('assets/client/plugins/instafeed/instafeed.min.js')}}"></script>


<!-- Main Script -->
<script src="{{ asset('assets/client/js/script.js')}}"></script>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });

        
</script>