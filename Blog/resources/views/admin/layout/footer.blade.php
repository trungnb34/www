</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin/dist/js/sb-admin-2.js') }}"></script>

<!-- DataTables JavaScript -->
<script src="{{ asset('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

{{--Slideup for errorlog--}}
<script src="{{ asset('admin/script/js.js') }}"></script>

{{--<script srec="{{ asset('admin/dist/js/bootstrap-select.min.js') }}"></script>--}}

@yield('javascript')

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--var mySelect = $('#first-disabled2');--}}

        {{--$('#special').on('click', function () {--}}
            {{--mySelect.find('option:selected').prop('disabled', true);--}}
            {{--mySelect.selectpicker('refresh');--}}
        {{--});--}}

        {{--$('#special2').on('click', function () {--}}
            {{--mySelect.find('option:disabled').prop('disabled', false);--}}
            {{--mySelect.selectpicker('refresh');--}}
        {{--});--}}

        {{--$('#basic2').selectpicker({--}}
            {{--liveSearch: true,--}}
            {{--maxOptions: 1--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</body>

</html>
