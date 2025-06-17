  $(document).ready(function() {
    $("#open_send_file").click(function() {
      document.getElementById('overlay').style.display='block'
      document.getElementById("send_file").style.display="inline-table"
    });
  });
  /***************************** */
    $(document).ready(function() {
    $("#close_btn").click(function() {
      document.getElementById('overlay').style.display='none'
      document.getElementById("send_file").style.display="none"
    });
  });
    /***************************** */
    $(document).ready(function() {
      $('#user_panel').click(function() {
        document.getElementById("chat_view").style.display="none"
        document.getElementById("control_panel").style.display="block"  

      });
    });