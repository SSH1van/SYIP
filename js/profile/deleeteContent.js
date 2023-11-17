// Deleting a file
try {
    $(".btn-element").click(function () {
        try {
            $(".btn-active").removeClass("btn-active");
        } catch (e) { }
        $(this).addClass("btn-active");
    })

    $(".btn-refusal").click(function () {
        $(".btn-active").removeClass("btn-active");
    })
} catch (e) { }
