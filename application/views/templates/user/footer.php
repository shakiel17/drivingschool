<!-- <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2023 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
      </footer> -->
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?=base_url();?>design/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?=base_url();?>design/assets/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?=base_url();?>design/assets/vendors/chart.js/js/chart.min.js"></script>
    <script src="<?=base_url();?>design/assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="<?=base_url();?>design/assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?=base_url();?>design/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script>
      $('.addReviews').click(function (){        
        document.getElementById('rev_id').value = '';
        document.getElementById('rev_comments').value = '';
      });
      $('.editReviews').click(function (){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('rev_id').value = id[0];
        document.getElementById('rev_comments').value = id[1];
      });
    </script>    
  </body>
</html>