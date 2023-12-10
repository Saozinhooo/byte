<!-- /. PAGE WRAPPER  -->
</div>
<div class="footer">


  <div class="row">
    <div class="col-lg-12">
      &copy; 2023 Travel & Tours | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
    </div>
  </div>
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- JQUERY SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url('assets/admin-template/assets/js/bootstrap.min.js'); ?>"></script>
<!-- CUSTOM SCRIPTS -->

<script src="<?php echo base_url('assets/admin-template/assets/js/custom.js'); ?>"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="<?php echo base_url('assets/dropzone/dist/dropzone.js'); ?>"></script>
<script src="<?php echo base_url('assets/imgCheckbox/jquery.imgcheckbox.js'); ?>"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.21.1/jquery.daterangepicker.min.js"></script>
<script>
  CKEDITOR.replace('ckeditor1', {
    height: 650,
  });
</script>
<script>
  $(document).ready(function() {
    var admin_list = $('#admin_list').DataTable({
      order: [[0, 'desc']],
      searching: true
    });
  });
</script>
<script>
  $(document).ready(function() {
    var guestlist = $('#GuestList').DataTable({
      order: [[3, 'desc']],
      searching: true,
      paging: true,

      initComplete: function () {
      // Add the date range filter input fields
      $('<label>From: <input type="text" id="min-date_guest"></label>').appendTo($('#GuestList_filter'));
      $('<label>To: <input type="text" id="max-date_guest"></label>').appendTo($('#GuestList_filter'));

      // Apply the date range filter on the DataTable
      $('#min-date_guest, #max-date_guest').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function() {
          guestlist.draw(); // Use 'table' variable directly
        }
      });

      $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
          var min = $('#min-date_guest').val();
          var max = $('#max-date_guest').val();
          var date = data[3] || ''; // Column index for the date column

          if ((min === '' || max === '') || (date >= min && date <= max)) {
            return true;
          }

          return false;
        }
      );
    }
    });
  });
</script>
<script>
 $(document).ready(function() {
  var table = $('#TransactionHistory').DataTable({
    order: [
      [6, 'desc']
    ],
    initComplete: function () {
      // Add the date range filter input fields
      $('<label>From: <input type="text" id="min-date"></label>').appendTo($('#TransactionHistory_filter'));
      $('<label>To: <input type="text" id="max-date"></label>').appendTo($('#TransactionHistory_filter'));

      // Apply the date range filter on the DataTable
      $('#min-date, #max-date').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function() {
          table.draw(); // Use 'table' variable directly
        }
      });

      $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
          var min = $('#min-date').val();
          var max = $('#max-date').val();
          var date = data[6] || ''; // Column index for the date column

          if ((min === '' || max === '') || (date >= min && date <= max)) {
            return true;
          }

          return false;
        }
      );
    }
  });
});

</script>
<script type="text/javascript">
  $(document).ready(function() {
    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
    $("#add_category").on("click", function() {
      $.confirm({

        scrollToPreviousElement: false,
        scrollToPreviousElementAnimate: false,
        title: 'Add New Category',
        content: '' +
          '<form action="" class="formName">' +
          '<div class="form-group">' +
          '<input type="text" class="category form-control" required />' +
          '<input type="hidden" id="user_id" name="user_id" value="<?= session()->user_id; ?>">' +
          '</div>' +
          '</form>',
        buttons: {
          formSubmit: {
            text: 'Add New Category',
            btnClass: 'btn-blue',
            action: function() {
              var category = $('.category').val();
              var user_id = $("#user_id").val();
              if (!category) {
                $.alert('Please provide a valid category');
                return false;
              }
              $.ajax({
                url: "<?= site_url('admin/post/insert_category') ?>",
                type: "POST",
                dataType: 'HTML',
                data: {
                  category: category,
                  user_id: user_id,
                  [csrfName]: csrfHash,
                },
                success: function(data) {
                  $.alert({
                    title: '',
                    content: 'Category Added!',
                  });

                  $('#category_lists').prepend(data);
                  $('#category_lists').slideDown(data);

                },
              });
            }
          },
          cancel: function() {
            //close
          },
        },
        onContentReady: function() {
          // bind to events
          var jc = this;
          this.$content.find('form').on('submit', function(e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
          });
        }
      });
    });
  });
</script>



<script type="text/javascript">
  Dropzone.autoDiscover = false;
  $(document).ready(function() {
    Dropzone.autoDiscover = false;
    $('#uploadModal').on('shown.bs.modal', function(e) {
      console.log("HEYEYEYEYE");
      //Simple Dropzonejs
      $("#uploadDropzone").dropzone({
        paramName: "ft_img",
        maxFilesize: 20,
        previewsContainer: "#imagePreview",
        url: "<?= base_url('admin/uploader/upload_img'); ?>",
        addRemoveLinks: true,
        success: function(file, response) {
          var imgName = response;
          file.previewElement.classList.add("dz-success");
          console.log("Successfully uploaded :" + imgName);
        },
        error: function(file, response) {
          file.previewElement.classList.add("dz-error");
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(".img_list").imgCheckbox({
    radio: true,
    canDeselect: true,
    onclick: function(el) {
      var isChecked = el.hasClass("imgChked");
      var imgEl = el.children()[0];
      var img = '<img class="img-fluid" src="<?= base_url() ?>/public/uploads/images/' + imgEl.name + '" style="width: 250px; height:250px; object-fit: cover;"/>';
      var img_input = '<input type="hidden" id="ft_img" name="ft_img" value="' + imgEl.name + '">';
      imgEl = el.children()[0]; // the img element
      $("#set_ft").on("click", function() {
        $('#img-display').html(img);
        $('form').append(img_input);
        $('#uploadModal').modal('hide');

      });
      console.log(imgEl.name + " is now " + (isChecked ? "checked" : "not-checked") + "!");
    }
  });
</script>

<script type="text/javascript">
  $(".edit_img_list").imgCheckbox({
    radio: true,
    canDeselect: true,
    onclick: function(el) {
      var isChecked = el.hasClass("imgChked");
      var imgEl = el.children()[0];
      var img = '<img class="img-fluid" src="<?= base_url() ?>/public/uploads/images/' + imgEl.name + '" style="width: 250px; height:250px; object-fit: cover;"/>';
      var img_input = '<input type="hidden" name="update_ft_img" value="' + imgEl.name + '">';
      imgEl = el.children()[0]; // the img element
      $("#update_ft").on("click", function() {
        $('#edit-img-display').html(img);
        $('#update_ft_img').replaceWith(img_input);
        $('#updateModal').modal('hide');

      });
      console.log(imgEl.name + " is now " + (isChecked ? "checked" : "not-checked") + "!");
    }
  });
</script>

<script type="text/javascript">
  $("#checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>

<script type="text/javascript">
  $(function() {
    $('#apply-btn').click(function() {
      var option = $("#cat_opt").val();
      if (option == "delete") {
        var val = [];
        var action_data = [];
        $('.action-chkbox:checked').each(function(i) {
          val[i] = $(this).val();
          action_data[i] = $(this).val();
          console.log(val[i]);
        });
        console.log(action_data);
        $.ajax({
          url: "<?= site_url('admin/post/delete_category') ?>",
          type: "POST",
          data: {
            action_data: action_data,
          },
          success: function(action_deleted) {
            $.alert({
              title: '',
              content: 'Category Deleted!',
              buttons: {
                confirm: function(confirm_btn) {
                  window.location.replace("<?= site_url('admin/post/categories') ?>");
                }
              }
            });
            console.log(action_deleted);

          },
        });
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".status_cmnt").on("change", function() {
      $("#changeCommentStatus").submit();
    });

  });
</script>

<script type="text/javascript">
  $("#checkAllComments").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>

<script type="text/javascript">
  $("#checkAllPackageComments").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>

<script type="text/javascript">
  $(function() {
    $('#apply-btn-comment').click(function() {
      var option = $("#comment_opt").val();
      var val = [];
      var action_data = [];
      var emails = [];
      $('.status_comment_checkbox:checked').each(function(i) {
        emails[i] = $(this).data('email');
        val[i] = $(this).val();
        action_data[i] = $(this).val();
        console.log(val[i]);
        console.log(option);
        console.log(emails[i]);
      });
      console.log(emails);
      console.log(action_data);
      $.ajax({
        url: "<?= site_url('admin/comments/changeCommentStatus') ?>",
        type: "POST",
        data: {
          action_data: action_data,
          option: option,
          emails: emails
        },
        success: function(action_posted) {
          $.alert({
            title: '',
            content: 'Status updated!',
            buttons: {
              confirm: function(confirm_btn) {
                window.location.replace("<?= site_url('admin/comments/blog') ?>");
              }
            }
          });
          console.log(action_posted);

        },
      });
    });
  });
</script>

<script type="text/javascript">
  $(function() {
    $('#apply-btn-packagecomment').click(function() {
      var option = $("#packagecomment_opt").val();
      var val = [];
      var action_data = [];
      var emails = [];
      $('.status_packagecomment_checkbox:checked').each(function(i) {
        emails[i] = $(this).data('email');
        val[i] = $(this).val();
        action_data[i] = $(this).val();
        console.log(val[i]);
        console.log(option);
      });
      console.log(action_data);
      $.ajax({
        url: "<?= site_url('admin/comments/changePackageCommentStatus') ?>",
        type: "POST",
        data: {
          action_data: action_data,
          option: option,
          emails: emails
        },
        success: function(action_posted) {
          $.alert({
            title: '',
            content: 'Status updated!',
            buttons: {
              confirm: function(confirm_btn) {
                window.location.replace("<?= site_url('admin/comments/package') ?>");
              }
            }
          });
          console.log(action_posted);

        },
      });
    });
  });
</script>

<script type="text/javascript">
  $("#checkAllAct").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>

<script type="text/javascript">
  $(function() {
    $('#apply-act-btn').click(function() {
      var option = $("#act_opt").val();
      var val = [];
      var action_data = [];
      $('.action-act-chkbox:checked').each(function(i) {
        val[i] = $(this).val();
        action_data[i] = $(this).val();
        console.log(val[i]);
        console.log(option);
      });
      console.log(action_data);
      $.ajax({
        url: "<?= site_url('admin/packages/activity_status') ?>",
        type: "POST",
        data: {
          action_data: action_data,
          option: option
        },
        success: function(action_posted) {
          if (action_posted == "updated") {
            $.alert({
              title: '',
              content: 'Status updated!',
              buttons: {
                confirm: function(confirm_btn) {
                  window.location.replace("<?= site_url('admin/packages/activities') ?>");
                }
              }
            });
          } else if (action_posted == "deleted") {
            $.alert({
              title: '',
              content: 'Status deleted!',
              buttons: {
                confirm: function(confirm_btn) {
                  window.location.replace("<?= site_url('admin/packages/activities') ?>");
                }
              }
            });
          }

          console.log(action_posted);

        },
      });
    });
  });
</script>










</body>

</html>