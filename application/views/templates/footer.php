           </div>
           </div>

           </div>


           <script src="<?= base_url('assets/'); ?>js/jquery-3.6.0.min.js"></script>

           <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>

           <script src="<?= base_url('assets/'); ?>js/feather.min.js"></script>

           <script src="<?= base_url('assets/'); ?>plugins/slimscroll/jquery.slimscroll.min.js"></script>

           <script src="<?= base_url('assets/'); ?>js/script.js"></script>

           <script>
               $('.custom-file-input').on('change', function() {
                   let fileName = $(this).val().split('\\').pop();
                   $(this).next('.custom-file-label').addClass("selected").html(fileName);
               });



               $('.form-check-input').on('click', function() {
                   const menuId = $(this).data('menu');
                   const roleId = $(this).data('role');

                   $.ajax({
                       url: "<?= base_url('admin/changeaccess'); ?>",
                       type: 'post',
                       data: {
                           menuId: menuId,
                           roleId: roleId
                       },
                       success: function() {
                           document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                       }
                   });

               });
           </script>
           </body>

           </html>