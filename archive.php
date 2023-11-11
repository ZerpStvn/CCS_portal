<div class="card-tools">
<div class="card-body">
	<div class="card card-outline card-success">
    <div class="card-body">
    <b>Archive</b>
        <button class="btn btn-flat btn-sm bg-gradient-success btn-success float-right" id="print"><i class="fa fa-print"></i> Print</button>

            <script>
	$('#print').click(function(){
		start_load()
		var _h = $('head').clone()
		var _p = $('#printable').clone()
		var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
		_p.prepend(_d)
		_p.prepend(_h)
		var nw = window.open("","","width=900,height=600")
		nw.document.write(_p.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)
	})
</script>