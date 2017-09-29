<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/ckfinder/ckfinder.js') }}"></script>
<script>
    CKEDITOR.replace( 'contentText');
    CKFinder.setupCKEditor(null,'/ckfinder');
</script>