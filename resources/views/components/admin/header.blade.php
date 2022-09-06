<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A Hetedik Független Irodalmi, Kulturális Folyóirat és Alkotóközösség" />
    <meta name="author" content="David Lukacs" />

    <title>{!! isset($title) ? $title : config('app.name') !!}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('web/images/favicon.ico') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template (general) -->
    <link href="{{ asset('css/custom/blog-admin.css') }}" rel="stylesheet">

    <!-- Custom styles (components) -->
    <link href="{{ asset('css/custom/admin/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/admin/forms.css') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/l64m960rju6okbhjnlqdyicse6160fuv14mcj39yoye2rftp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
