    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('assets/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@0.4.1/dist/html2canvas.min.js"></script>
    <script>
        document.getElementById('booking').addEventListener('click', function() {
            var userId = document.querySelector('input[name="user_id"]').value;
            var name = document.querySelector('input[placeholder="Name *"]').value;
            var email = document.querySelector('input[placeholder="Email address *"]').value;
            var phone = document.querySelector('input[name="phone"]').value;
            var date = document.querySelector('input[name="date"]').value;
            var time = document.querySelector('input[name="time"]').value;
            var note = document.querySelector('textarea[name="note"]').value;

            var message = "";
            message += "================================================\n";
            message += "😊 Catering Dioli\n";
            message += "🍽️ Sejuta Rasa, Satu Cerita dari dapur kami\n";
            message += "🏠 Alamat : Jln .Semampir Rt 04. Rw 02 Pati\n";
            message += "📅 Tanggal: " + date + "\n";
            message += "================================================\n\n";
            message += "Pesanan Baru:\n";
            message += "**Nama:** " + name + "\n";
            message += "**Email:** " + email + "\n";
            message += "**Phone:** " + phone + "\n";
            message += "**Time:** " + time + "\n";
            message += "**Note:** " + note + "\n";
            message += "\n";
            message += "ℹ️ Kunjungi website kami untuk info lebih lanjut: https://www.cateringdioli.com\n";
            message += "🎉 Dapatkan diskon 10% untuk pemesanan bulan ini!\n\n";


            var whatsappNumber = '6289525105080'; // Ganti dengan nomor WhatsApp Anda
            var whatsappUrl =
                `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodeURIComponent(message)}`;

            window.open(whatsappUrl, '_blank');
        });
    </script>
