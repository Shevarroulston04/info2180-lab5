window.onload = function() {
    let button = document.querySelector("#lookup");
    let input = document.querySelector("#country");

    // When clicking the button
    button.addEventListener("click", () => {
        let country = input.value;
        fetch(`world.php?country=${country}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#result").innerHTML = data;
            });
    });

    // When pressing Enter
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            button.click();
        }
    });
};
