
</div>
</div>

<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#datatables').DataTable();
	});
	$(document).ready(function(){
		$('#datatable').DataTable();
	});
</script>
<script src="../assets/fontawesome/js/all.js"></script>
<script src="../assets/js/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function tampilkanwaktu(){   
      var waktu = new Date(); 
      var sh = waktu.getHours() + "";
      var sm = waktu.getMinutes() + "";  
      var ss = waktu.getSeconds() + "";
      document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
  </script>
</body>
</html>