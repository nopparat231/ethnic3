<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    let data = { a: '123', b: '456' };
    $.ajax({
        type: "POST",
        url: "my_php.php",
        data: data,
        success: function( data ) {
        }
    });
</script>