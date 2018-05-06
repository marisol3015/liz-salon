<html>
    <head>
            <link rel="stylesheet" href="/fullcalendar-3.9.0/fullcalendar.min.css"/>
<!-- jQuery -->
<script src='/fullcalendar-3.9.0/lib/jquery.min.js'></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="/fullcalendar-3.9.0/fullcalendar.min.css"/>

<script src="/fullcalendar-3.9.0/fullcalendar.min.js"></script>
    </head>
<body style="background-image: url('/admin/images/fondo.jpg')">
   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2><kbd> Calendario de citas</kbd</h2></div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/fullcalendar-3.9.0/lib/moment.min.js"></script>
<script src="/fullcalendar-3.9.0/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
<script src="{{asset('/fullcalendar-3.9.0/locale/es.js')}}"></script>
</html>


