@section('script')
    <script type="text/javascript">
        $('#name').on('blur', function () {
            var theTitle = this.value.toLowerCase().trim();
            var slugInput = $('#slug');
            var theSlug = theTitle
                .replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });
    </script>
@endsection