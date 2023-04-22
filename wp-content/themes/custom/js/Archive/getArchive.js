$(document).ready(function () {
    var user = document.getElementById("user_id").value;
    $.ajax({
        url: "/prenotazioni/backend/API/prenotation/getReservationByUser.php",
        type: "GET",
        data: {
            user: user
        },
        success: function (data) {
            for (let i = 0; i < data.length; i++)
                reservation.push(Object.values(data[i]));

            table = $('#archive').DataTable({
                data: reservation,
                select: 'single',
                select: true,
                columns: [{
                    title: 'ID',
                    visible: false,
                    searchable: false,
                },
                {
                    title: 'Nome'
                },
                ],
                createdRow: function (row, data, dataIndex) {
                    $(row).attr('number', data[0]);
                },
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
});