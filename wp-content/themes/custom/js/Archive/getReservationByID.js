$(window).on('load', function () {
    $('#archive tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected') == false) {
            id = $(this)[0]["cells"][0].textContent;
            $.ajax({
                url: "/prenotazioni/backend/API/prenotation/getReservationById.php",
                type: "GET",
                data: {
                    id: id
                },
                success: function (data) {
                    data = data[0];
                    $("#name").text(data["name"]);
                    $("#start").text(data["start_day_booking"]);
                    $("#end").text(data["end_day_booking"]);
                    $("#class").text(data["class"]);
                    $("#ref").text(data["year_class"] + data["section_class"]);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        } else {
            let defaultString = "";
            let defaultElement = "<i>Seleziona una prenotazione</i>";

            $("#name").text(defaultString);
            $("#name").append(defaultElement);

            $("#start").text(defaultString);
            $("#start").append(defaultElement);

            $("#end").text(defaultString);
            $("#end").append(defaultElement);

            $("#class").text(defaultString);
            $("#class").append(defaultElement);

            $("#ref").text(defaultString);
            $("#ref").append(defaultElement);
        }
    });
});