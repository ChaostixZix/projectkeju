@include('kc.head')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Post</h3>
        <div class="row mt">
            <div class="col-lg-12">

                <!-- -- 3RD ROW OF PANELS ---->
                <!-- Product Panel -->
                <div class="row">
                    <!-- -- Blog Panel ---->
                    @foreach($datapost as $dp)
                    <div class="col-lg-8 col-md-8 col-sm-8 mb">
                        <div class="content-panel pn">
                            <div id="blog-bg">
                                <div class="badge badge-popular">{{$dp->poster}}</div>
                                <div class="blog-title">{{$dp->judul}}</div>
                            </div>
                            <div class="blog-text">
                                <h3>{!! $dp->content !!}<h3>
                            </div>
                        </div>
                    </div><!-- /col-md-4-->
                    @endforeach

                </div><!-- -- END 3RD ROW OF PANELS ---->
            </div>
        </div>

    </section><!-- --/wrapper ---->
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
