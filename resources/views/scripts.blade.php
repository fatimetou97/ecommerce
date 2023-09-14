

<script src={{asset("assets/js/core/popper.min.js")}}></script>
<script src={{asset("assets/js/core/bootstrap.min.js")}}></script>
<script src={{asset("assets/js/plugins/perfect-scrollbar.min.js")}}></script>
<script src={{asset("assets/js/plugins/smooth-scrollbar.min.js")}}></script>
<script src={{asset("assets/js/plugins/chartjs.min.js")}}></script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }


</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>

    const links = document.querySelectorAll('.linkclass');

    if (links.length) {
      links.forEach((link) => {
        link.addEventListener('click', (e) => {
          links.forEach((link) => {
              link.classList.remove('active');
          });
        //  e.preventDefault();
          link.classList.add('active');

        });
      });
    }
    </script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>

{{-- //multiseelect --}}


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
{{-- <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
<script src="js/mobiscroll.javascript.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.product_options').select2();
    });

    </script>

