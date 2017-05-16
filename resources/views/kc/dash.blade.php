@include('kc.head')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-9 main-chart">

                <div class="row">
                    <div class="col-md-4 col-sm-4 mb">
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>Players</h5>
                            </div>
                            <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                            <footer>
                                <div class="centered">
                                    <h5><i class="fa fa-trophy"></i> {{$jumlahuser}}</h5>
                                </div>
                            </footer>
                        </div><!-- -- /darkblue panel ---->
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 mb">
                        <div class="twitter-panel pn">
                            <i class="fa fa-cloud fa-5x"></i>
                            <p>Bantu Kami Dengan Melaporkan Bug Didalam Server :D</p>
                            <p class="user">@ChaostixZix | Developer</p>
                        </div>
                    </div>

                </div><!-- /row mt -->




            </div><!-- /col-lg-9 END SECTION MIDDLE -->


            <!-- **********************************************************************************************************************************************************
            RIGHT SIDEBAR CONTENT
            *********************************************************************************************************************************************************** -->

            <div class="col-lg-3 ds">
                <!--COMPLETED ACTIONS DONUTS CHART-->
                <h3>Latest Post</h3>

                <!-- First Action -->
                <a hidden>{{$no = 0}}</a>
                @foreach($post as $p)
                    @if($no < 3)
                        <div class="desc">
                            <div class="thumb">
                                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                            </div>
                            <div class="details">
                                <p><a href="#" data-target="#{{$p->id}}Post" data-toggle="modal">{{strtoupper(strip_tags($p->judul)) . "..."}}</a><br/>
                                    {{strtoupper(substr(strip_tags($p->content), 0, 20)) . "..."}}<br/>
                                </p>
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
                        <a hidden>{{$no++}}</a>
                    @endif
                @endforeach
                <h3><button onclick="window.location.replace('{{url('panel/allpost')}}');" class="btn btn-warning">See All Post</button></h3>






            </div><!-- /col-lg-3 -->
        </div><! --/row -->
        <div class="row">
            <div class="col-lg-12 main-chart">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb">
                        <div class="grey-panel" pn">
                        <div class="grey-header">
                            <h4>Selamat Datang</h4>
                        </div>

                            <i class="fa fa-paper-plane fa-5x"></i>
                            <p>Selamat Datang Di KejuCraft User Panel.<br>
                            Disini Kamu Bisa Membeli CheeseCoin, Rank, Dan Item.<br>
                            Kamu Akan Mendapat Hadiah Jika Kamu Vote</p>
                        </div>
                    </div>

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
