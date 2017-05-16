@include('kc.head')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Profile</h4>
                    <form class="form-horizontal style-form" method="post">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">UserName</label>
                            <div class="col-lg-10">
                                <p class="form-control-static">{{$user}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Rank</label>
                            <div class="col-lg-10">
                                <p class="form-control-static">{{$rank}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input placeholder="@foreach($userdata as $u){{$u->email}}@endforeach" name="email" type="text" class="form-control round-form">
                                <span class="help-block">Email Mu Digunakan Untuk Mendapatkan Passwordmu Kembali Jika Suatu Saat Akunmu Dicuri.</span>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Profile</h4>
                    <form action="{{url('changepw')}}" class="form-horizontal style-form" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password Lama</label>
                            <div class="col-sm-10">
                                <input placeholder="Password Lama" name="oldpass" type="text" class="form-control round-form">
                                <span class="help-block">Jika Kamu Tidak Tahu Apa Password Lama Mu, Silahkan Kontak Admin.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
                            <div class="col-sm-10">
                                <input placeholder="Password Baru" name="newpass" type="text" class="form-control round-form">
                            </div>
                        </div>
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button  type="submit" class="form-control btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div>
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
