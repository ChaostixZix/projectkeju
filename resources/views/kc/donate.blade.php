@include('kc.head')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12 main-chart">
                @if(!empty(session('message')) and session('message') == "kurang")
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>GAGAL</strong> CheeseCoin Mu Kurang. Silahkan Mengisi Ulang CheeseCoin Mu
                </div>
                @elseif(!empty(session('message')) and session('message') == "sell")
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>GAGAL</strong> Jual Rank Mu Sebelumnya Lalu Beli Rank Yang Baru!
                    </div>
                @elseif(!empty(session('message')) and session('message') == "sellrank")
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Sukses</strong> Kamu Telah Menjual Rank Mu Sebelumnya, Sekarang Rank Mu Adalah {{$rank}}!
                    </div>
                @elseif(!empty(session('message')) and session('message') == "sell")
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>GAGAL</strong> Silahkan Kontak Admin, Error Code = Player Belum Terdaftar Rank
                    </div>
                @endif

                <div class="row ">
                    @foreach($datarank as $d)
                            <div class="col-md-4 col-sm-4 mb">

                                        @if($d->rank == $rank)
                                        <div class="grey-panel pn donut-chart">
                                    <div class="grey-header">
                                        <h5>{{$d->rank}}</h5>
                                    </div>
                                        @else
                                                <div class="darkblue-panel pn donut-chart">
                                            <div class="darkblue-header">
                                                <h5>{{$d->rank}}</h5>
                                            </div>
                                        @endif

                                    <p>
                                        <i class="fa fa-money fa-3x">{{$d->harga}}</i></p><br>

                                        @if($d->rank == $rank)
                                            <h5>Selamat, Rank Kamu Sekarang Adalah {{$d->rank}}</h5>
                                        @else
                                            <p>Klik Lihat Fitur Untuk Melihat Fitur</p>
                                        @endif

                                    <a href="#" data-toggle="modal" data-target="#{{$d->id}}">Lihat Fitur</a><br><br>

                                        @if($d->rank == $rank)
                                    <button onclick="window.location.replace('{{url('sellrank')}}');" class="btn btn-danger"="">Sell Rank</button>
                                            @else
                                            <button onclick="window.location.replace('{{url('buyrank/' . $d->rank)}}');" class="btn btn-round">Buy</button>
                                        @endif


                                </div><!-- --/grey-panel ---->
                            </div>
                            <div class="modal fade" id="{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">{{$d->rank}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{$d->fitur}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach



                </div><!-- /row mt -->




            </div><!-- /col-lg-9 END SECTION MIDDLE -->


            <!-- **********************************************************************************************************************************************************
            RIGHT SIDEBAR CONTENT
            *********************************************************************************************************************************************************** -->


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
