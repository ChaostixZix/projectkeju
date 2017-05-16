@include('kc.head')
<!--main content start-->
<script type="text/javascript" src="{{asset('datatable')}}/media/js/jquery.js"></script>
<script type="text/javascript" src="{{asset('datatable')}}/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('datatable')}}/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="{{asset('datatable')}}/media/css/dataTables.bootstrap.css">

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @if(!empty(session('message')) and session('message') == "success")
                    <div class="alert alert-success"><b>Berhasil</b> Membuat Post.</div>
                    @elseif(!empty(session('message')) and session('message') == "gagal")
                        <div class="alert alert-danger"><b>Gagal</b> Membuat Post. Contact Developer Segera!!!</div>
                    @endif
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Profile</h4>
                    <form action="{{url('/postadd')}}" class="form-horizontal style-form" method="post">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Judul</label>
                            <div class="col-lg-10">
                                <input name="judul" class="form-control round-form" placeholder="Judul">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Content</label>
                            <div class="col-sm-10">

                                <textarea name="content" type="text" class="form-control round-form"></textarea>
                            </div>
                        </div>
                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-panel">
                    <h4><i class="fa fa-angle-right"></i> Posts</h4><hr>
                        <table class="table table-striped table-advance table-hover data">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> Judul</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> ID</th>
                                <th><i class="fa fa-bookmark"></i> Content</th>
                                <th><i class=" fa fa-edit"></i> Poster</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post as $p)
                            <tr>
                                <td><a data-target="#{{$p->id}}Post" data-toggle="modal" href="#">{{$p->judul}}</a></td>
                                <td class="hidden-phone">{{$p->id}}</td>
                                <td>{{strtoupper(substr(strip_tags($p->content), 0, 20)) . "..."}} </td>
                                <td><span class="label label-info label-mini">{{$p->poster}}</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button data-target="#{{$p->id}}PostEdit" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="{{$p->id}}Post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">{{$p->judul}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! $p->content !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{$p->id}}PostEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">{{$p->judul}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('/postadd')}}" class="form-horizontal style-form" method="post">
                                                <div class="form-group">
                                                    <label class="col-lg-2 col-sm-2 control-label">Judul</label>
                                                    <div class="col-lg-10">
                                                        <input name="judulBaru" class="form-control round-form" value="{{$p->judul}}"><br>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Content</label>
                                                    <div class="col-sm-10">

                                                        <textarea name="contentBaru"  type="text" class="form-control round-form">{{$p->content}}</textarea>
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
