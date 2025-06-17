$(document).ready(function() {
    $('#send_order').click(function() {
        var srv_id = new URLSearchParams(window.location.search).get('srv');
        var pr_id = new URLSearchParams(window.location.search).get('id');
        var order_desc =document.getElementById("order_desc").value
        var title =document.getElementById("title").value
      $.post('new_order.php?id='+pr_id+"&srv="+srv_id, { order_desc:order_desc,title:title })
        .done(function(response) {
          document.getElementById("overlay").style.display='block'
          document.getElementById("order_ok").style.display='block'
          setInterval(() => {
             document.getElementById("overlay").style.display='none'
          document.getElementById("order_ok").style.display='none'
          window.location.href='chat.php'  
        }, 4000);
        })
        .fail(function(xhr, status, error) {
          $('#response').html('حدث خطأ: ' + error);
        });
    });
  });