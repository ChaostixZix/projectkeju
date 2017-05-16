@include('kc.head')
<!--main content start-->
<script type="text/javascript" src="{{asset('datatable')}}/media/js/jquery.js"></script>
<script type="text/javascript" src="{{asset('datatable')}}/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('datatable')}}/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="{{asset('datatable')}}/media/css/dataTables.bootstrap.css">

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="form-panel">
                    <h4><i class="fa fa-angle-right"></i> User</h4><hr>
                    <table class="table table-striped table-advance table-hover data">
                        <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> Username</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                            <th><i class="fa fa-bookmark"></i> Content</th>
                            <th><i class=" fa fa-edit"></i> Rank</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userlist as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td class="hidden-phone">{{$u->email}}</td>
                                <td> </td>
                                <td><span class="label label-info label-mini">{{$u->hash}}</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button data-target="#{{$u->name}}PlayerEdit" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="{{$u->name}}PlayerEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">{{$u->name}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('/postadd')}}" class="form-horizontal style-form" method="post">
                                                <div class="form-group">
                                                    <label class="col-lg-2 col-sm-2 control-label">Judul</label>
                                                    <div class="col-lg-10">
                                                        <input name="judulBaru" class="form-control round-form" value="{{$u->name}}"><br>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Content</label>
                                                    <div class="col-sm-10">

                                                        <textarea name="contentBaru"  type="text" class="form-control round-form">{{$u->name}}</textarea>
                                                    </div>
                                                </div>
                                            {{csrf_field()}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.data').DataTable();
                        });
                    </script>
                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div>
    </section>
</section>

<!--main content end-->

</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="{{asset('dash')}}/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="{{asset('dash')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{asset('dash')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('dash')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('dash')}}/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="{{asset('dash')}}/js/common-scripts.js"></script>

<script type="text/javascript" src="{{asset('dash')}}/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="{{asset('dash')}}/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="{{asset('dash')}}/js/sparkline-chart.js"></script>
<script src="{{asset('dash')}}/js/zabuto_calendar.js"></script>

<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
<script>
    tinymce.init({ selector:'textarea' });
</script>


</body>
</html>
