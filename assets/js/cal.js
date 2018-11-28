function calSendData() {
    let month = $("#selectMonth").val()
    let year = $("#selectYear").val()
    $.post("http://thedoudou.myds.me/be_code/php/lib/api.php?app=cal", { month: month, year: year },
        function (data) {
            $('#results').html(data)
        })
}

calSendData()

$( "#selectMonth" ).change(function() {
    calSendData()
})

$( "#selectYear" ).change(function() {
    calSendData()
})