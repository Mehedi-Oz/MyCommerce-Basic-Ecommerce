<script src="{{ asset('admin-asset') }}/assets/node_modules/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin-asset') }}/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('admin-asset') }}/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{ asset('admin-asset') }}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{ asset('admin-asset') }}/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{ asset('admin-asset') }}/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{ asset('admin-asset') }}/assets/node_modules/raphael/raphael-min.js"></script>
<script src="{{ asset('admin-asset') }}/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="{{ asset('admin-asset') }}/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>



<script src="{{ asset('admin-asset') }}/dist/js/dashboard1.js"></script>


//Image Upload View - Dropify
<script src="{{ asset('admin-asset') }}/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

//SummerNote - Editor
<script src="{{ asset('admin-asset') }}/assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
</script>

{{-- <script>
    $(function() {
        $(document).on('change', '#categoryID', function() {
            var categoryID = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('product.get-subcategory-by-category') }}",
                data: {
                    id: categoryID
                },
                dataType: "JSON",
                success: function(response) {
                    var subcategoryID = $('#subcategoryID');
                    subcategoryID.empty();
                    var option = '<option value="" disabled selected>--select a subcategory--</option>';
                    $.each(response, function(key, value) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    subcategoryID.append(option);
                }
            });
        });
    });
</script> --}}

<script>
    $(function() {
        $(document).on('change', '#categoryID', function() {
            var categoryID = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('product.get-subcategory-by-category') }}",
                data: {
                    id: categoryID
                },
                dataType: "JSON",
                success: function(response) {
                    var subcategoryID = $('#subcategoryID');
                    subcategoryID.empty();
                    var option =
                        '<option value="" disabled selected>--select a subcategory--</option>';
                    $.each(response, function(key, value) {
                        option +=
                            '<option value=' + value.id + '>'+ value.name +'</option>';
                    });
                    subcategoryID.append(option);
                }
            });
        });
    });
</script>
