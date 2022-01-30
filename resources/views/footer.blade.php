  
<!--===============================================================================================-->

<!--===============================================================================================-->
  <script src="{{url('/public/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('/public/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{url('/public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('/public/vendor/select2/select2.min.js')}}"></script>
  <script src="{{url('/public/js/main.js')}}"></script>
  <script src="{{url('/public/js/toastr.min.js')}}"></script>

  <script>
    function successToaster(message) {
    toastr.remove();
    toastr.options.closeButton = true;
    toastr.success(message, '', {timeOut: 5000});
}
function errorToaster(message) {
    toastr.remove();
    toastr.options.closeButton = true;
    toastr.error(message, '', {timeOut: 5000});
}
function showButtonLoader(id, text, action) {
  if (action === 'disable') {
      $('#' + id).prop('disabled', true);
  } else {
      $('#' + id).html(text);
      $('#' + id).prop('disabled', false);
  }
}
 //only number
 function onlyNumberKey(evt) {
    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;
  }
  </script>
</body>
</html>