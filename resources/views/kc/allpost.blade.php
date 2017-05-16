@include('kc.head')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12 main-chart">

                <div class="row">
                    @foreach($post as $p)
                        <div class="col-lg-4 col-md-4 col-sm-4 mb">
                            <div class="content-panel pn">
                                <div id="blog-bg">
                                    <div class="badge badge-popular">{{$p->poster}}</div>
                                    <div class="blog-title">{{$p->judul}}</div>
                                </div>
                                <div class="blog-text">
                                    <h2>{{substr(strip_tags($p->content), 0, 10) . "..."}}</h2>
                                    <center><button data-target="#{{$p->id}}Post" data-toggle="modal" class="btn btn-warning">Read More</button></center>
                                </div>
                            </div>

                        </div>
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

                    @endforeach

                </div><!-- /row mt -->




            </div><!-- /col-lg-9 END SECTION MIDDLE -->
        </div><! --/row -->
    </section>
</section>

<!--main content end-->

</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('dash')}}/js/jquery.js"></script>
<script src="{{asset('dash')}}/js/jquery-1.8.3.min.js"></script>
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


</body>
</html>
