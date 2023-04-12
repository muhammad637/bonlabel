<script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>
<script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../../assets/vendor/aos/aos.js"></script>
<script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<!-- Template Main JS File -->

<script src="../../assets/js/landingPage.js"></script>
<script src="../../assets/js/main.js"></script>
<!-- Template Main JS File -->

<script>
    $(document).ready(function() {
        // $('#iasd').html('simpan pinjam')
        $('#example').DataTable();


        // ubahStock script
        var count = $('.counter').val()
        $('.tambah').on('click',function(){
            $('.counter').val(count)
            count++
        })
        $('.kurang').on('click',function(){
            $('.counter').val(count)
            if (count == 0) count = 0
            else count--
            
        })

        $('#show-password').change(function() {
            var passwordInput = $('#password');
            var passwordFieldType = passwordInput.attr('type');

            // Toggle tampilan password
            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
            }
        });
        // $('#mybutton').click(function() {
        //     var passwordInput = $('#currentPassword');
        //     var passwordFieldType = passwordInput.attr('type');

        //     // Toggle tampilan password
        //     if (passwordFieldType === 'password') {
        //         passwordInput.attr('type', 'text');
        //     } else {
        //         passwordInput.attr('type', 'password');
        //     }
        // });
        $('#eye').addClass('bi bi-eye-slash-fill')
        $('#eye1').addClass('bi bi-eye-slash-fill')
        $('#mybutton').click(function() {
            // $('#currentPassword').attr('value','aan')
            var passwordInputan = $('#currentPassword');
            var passwordFieldTypean = passwordInputan.attr('type');

            // Toggle tampilan password
            if (passwordFieldTypean === 'password') {
                passwordInputan.attr('type', 'text');
                $('#eye1').removeClass('bi bi-eye-slash-fill')
                $('#eye1').addClass('bi bi-eye-fill')
            } else {
                $('#eye1').addClass('bi bi-eye-slash-fill')
                $('#eye1').removeClass('bi bi-eye-fill')
                passwordInputan.attr('type', 'password');
            }
        });
        $('#mybutton2').click(function() {
            var passwordInput = $('#newPassword');
            var passwordFieldType = passwordInput.attr('type');

            // Toggle tampilan password
            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
                $('#eye').removeClass('bi bi-eye-slash-fill')
                $('#eye').addClass('bi bi-eye-fill')
            } else {
                $('#eye').addClass('bi bi-eye-slash-fill')
                $('#eye').removeClass('bi bi-eye-fill')
                passwordInput.attr('type', 'password');
            }
        });
    });
</script>

@include('sweetalert::alert')
